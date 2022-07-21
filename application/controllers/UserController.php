<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('UserModel', 'PerusahaanModel', 'PengirimanModel'));
		$this->load->helper(array('DataStructure', 'Validation'));
		$this->db->db_debug = false;
	}

	public function index()
	{
		redirect('login');
	}

	public function login()
	{
		$this->load->view('PublicPage', [
			'title' => "Home",
			'content' => 'public/LandingPage',
		]);
	}

	public function create_account()
	{
		$this->SecurityModel->guestOnlyGuard();
		$pageData = array(
			'title' => 'Daftar',
		);

		$this->load->view('RegisterPage', $pageData);
	}

	public function loginProcess()
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

			$loginData = $this->input->post();

			$user = $this->UserModel->login($loginData);

			$this->session->set_userdata($user);
			echo json_encode(array("error" => FALSE, "user" => $user));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function registerProcess()
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			Validation::ajaxValidateForm($this->SecurityModel->loginValidation());

			$data = $this->input->post();
			// $email = test_input($_POST["email"]);
			if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				throw new UserException("Email tidak valid.", WRONG_PASSWORD_CODE);
			} else {
				$email = $this->UserModel->getAllUser(['email' => $data['email'], 'is_login' => TRUE]);
				if (!empty($email))
					throw new UserException("Email sudah terdaftar.", WRONG_PASSWORD_CODE);
			}
			// var_dump($data);
			// die();

			$data = $this->UserModel->registerUser($data);
			// var_dump($data);
			// die();
			$this->email_send($data, 'registr');
			echo json_encode(array("error" => FALSE, "user" => 'success'));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function lupasProcess()
	{
		try {

			$data = $this->input->post();
			$data = $this->UserModel->cekUserByEmailLupaPassword($data);
			$this->email_send($data, 'lupa_password');
			echo json_encode(array("error" => FALSE, "user" => 'success'));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}


	public function verifikasiLupasProcess($id, $token, $ajax = true)
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			$data['token'] = $token;
			$data['id_user'] = $id;
			$data = $this->UserModel->LupaPassword($data, $ajax);

			// $this->email_send($data, 'activate');
			// redirect('login');
			// echo json_encode($data);
			// $this->load
			$this->load->view('PublicPage', [
				'title' => "Daftar",
				'content' => 'public/LupaPasswordToken',
				'dataContent' => $data
			]);
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function resetPasswordProcess()
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			// $data['token'] = $token;
			// $data['id_user'] = $id;

			// Validation::ajaxValidateForm($this->SecurityModel->loginValidation());
			// 
			$data = $this->input->post();
			if ($data['password'] != $data['repassword']) {
				throw new UserException("Password tidak sama", USER_NOT_FOUND_CODE);
			}

			$this->UserModel->LupaPassword($data, true);
			$this->UserModel->changePasswordCustomer($data);

			echo json_encode(array('error' => false));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}


	public function activator($id, $activate)
	{
		try {
			// $this->SecurityModel->guestOnlyGuard(TRUE);
			$data['activator'] = $activate;
			$data['id'] = $id;
			$data = $this->UserModel->activatorUser($data);

			$this->email_send($data, 'activate');
			redirect('login');
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function email_send($data, $action)
	{
		$serv = $this->UserModel->getEmailConfig();

		$send['to'] = $data['email']; //KPB
		if ($action == 'activate') {
			$send['subject'] = 'Activation Indometal Asia Aplication';
			$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="https://indometalasia.com/apps/assets/img/ima-transparent2.png" width="60px" vspace=0 /></td></tr>';
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$url_act = site_url("/activator/{$data['id']}/{$data['activator']}");
			$emailContent .= "<br><br> Username :  {$data['username']}
						<br> Password :  {$data['password_hash']}
						<br> 
						<br>Selamat Akun anda sudah berhasil didaftarkan, silahkan login dan lengkapi data.";
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='indometalasia.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>indometalasia.com</a></p></td></tr></table></body></html>";
		} else if ($action == 'lupa_password') {
			$send['subject'] = 'Lupa Password Indometal Asia Aplication';
			$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background: white;padding-left:3%"><img src="http://indometalasia.com/apps/assets/img/ima-transparent2.png" width="200px" vspace=0 /></td></tr>';
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$url_act = base_url("/forgot-password-verification/{$data['id_user']}/{$data['token']}");
			$emailContent .= "<br><br> Username :  {$data['username']}
						<br> Token :  {$data['token']}
						<br> 
						<br>Untuk reset password silahkan<a href='{$url_act}' > klik ini </a>atau masuk melalui url di bawah. 
						<br>{$url_act}";
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='indometalasia.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>indometalasia.com</a></p></td></tr></table></body></html>";
		} else {
			$send['subject'] = 'Activation Store PT INDOMETALASIA';
			$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="https://store.indometalasia.com/assets/images/ima-transparent2.png" width="60px" vspace=0 /></td></tr>';
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$url_act = base_url("/activator/{$data['id']}/{$data['activator']}");
			$emailContent .= "<br><br> Username :  {$data['username']}
						<br> Password :  {$data['password_hash']}
						<br> Activator :  {$data['activator']}
						<br> 
						<br><a href='{$url_act}' target='_blank' style='text-decoration:none;color: #60d2ff;'>Click this to activate</a>

						<br> manual activate = {$url_act}";
			$emailContent .= '<tr><td style="height:20px"></td></tr>';
			$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='indometalasia.com' target='_blank' style='text-decoration:none;color: #60d2ff;'>indometalasia.com</a></p></td></tr></table></body></html>";
		}
		$send['message'] = $emailContent;

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = $serv['stmp_mail']['url_'];
		$config['smtp_port']    = '587';
		$config['smtp_timeout'] = '60';
		$config['smtp_user']    = $serv['stmp_mail']['username'];    //Important
		$config['smtp_pass']    = $serv['stmp_mail']['key'];  //Important
		$config['charset']    = 'utf-8';
		$config['newline']    = '\r\n';
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not 
		$send['config'] = $config;

		$this->email->initialize($send['config']);
		$this->email->set_mailtype("html");
		$this->email->from($serv['stmp_mail']['username']);
		$this->email->to($send['to']);
		$this->email->subject($send['subject']);
		$this->email->message($send['message']);
		$res = $this->email->send();
		$mes = $this->email->print_debugger();
		// var_dump($res);
		// var_dump($res);
		// die();
		return 0;
	}
	public function update()
	{
		try {
			$profile = $this->input->post();
			$profile['id_user'] = $this->session->userdata('id_user');
			$newProfile = $this->UserModel->updateDosenLocal($profile);
			$oldSess = $this->session->userdata();
			$this->session->set_userdata(array_merge($oldSess, $newProfile));
			$profile = DataStructure::slice($this->session->userdata(), ['nidn', 'nohp', 'telepon', 'email', 'bidang_keahlian']);
			echo json_encode(array('profile' => $profile));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function changePassword()
	{
		try {
			$this->SecurityModel->roleOnlyGuard('pengusul', TRUE);
			$this->SecurityModel->pengusulSubTypeGuard(['dosen_tendik'], TRUE);
			// Validation::ajaxValidateForm($this->SecurityModel->deleteDosenTendik());

			$CP = $this->input->post();
			if (md5($CP['old_password']) != $this->session->userdata('password')) {
				throw new UserException('Password Lama Salah', 0);
			}
			$this->UserModel->changePassword($CP);
			$this->session->set_userdata('password', md5($CP['password']));
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function changeUsername()
	{
		$this->SecurityModel->apiKeyGuard();
		try {
			$data = $this->input->post();

			if (!isset($data['username']) || !isset($data['username_new'])) {
				throw new UserException('Parameter tidak lengkap', 0);
			}
			$this->UserModel->changeUsername($data);
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function getAllUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->UserModel->getAllUser($this->input->post());
			echo json_encode(array("data" => $data));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function addUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$idUser = $this->UserModel->addUser($this->input->post());
			$user = $this->UserModel->getUser($idUser);
			echo json_encode(array("data" => $user));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function editUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$idUser = $this->UserModel->editUser($this->input->post());
			$user = $this->UserModel->getUser($idUser);

			if ($user['id_user'] == $this->session->userdata('id_user')) {
				$this->session->set_userdata(array_merge($this->session->userdata(), $user));
			}
			if ($user['id_role'] == '2') {
				$id = $this->PerusahaanModel->getAll(array('is_user' => '1', 'id_user' => $user['id_user']));
				$this->PerusahaanModel->updateModifedDate($id);
			}

			echo json_encode(array("data" => $user));
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function deleteUser()
	{
		try {
			$this->SecurityModel->userOnlyGuard(TRUE);
			$data = $this->input->post();
			$this->UserModel->deleteUser($data);
			echo json_encode(array());
		} catch (Exception $e) {
			ExceptionHandler::handle($e);
		}
	}

	public function logout()
	{
		// $this->SecurityModel->userOnlyGuard();
		$this->session->sess_destroy();
		echo json_encode(["error" => FALSE, 'data' => 'Logout berhasil.']);
	}
}
