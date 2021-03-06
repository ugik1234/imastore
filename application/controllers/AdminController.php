<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('NewsModel', 'BuyerModel', 'PengirimanModel', 'PerusahaanModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
  }

  public function index()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'admin/DashboardPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function kelolah_seller()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));

    $pageData = array(
      'title' => 'Kelola User',
      // 'content' => 'admin/KelolaUserPage',
      'content' => 'admin/KelolahSeller',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function  request_buyer()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
    $pageData = array(
      'title' => 'Request Buyer',
      'content' => 'admin/RequestBuyerPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function  DetailRequest()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));

    $pageData = array(
      'title' => 'Request Buyer',
      'content' => 'admin/DetailBuyerPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      "contentData" => ['id_buyer' => $this->input->get()['id_buyer']]
    );
    $this->load->view('Page', $pageData);
  }

  public function  request_seller()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
    $pageData = array(
      'title' => 'Request Seller',
      'content' => 'admin/RequestSellerPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function  DetailRequestSeller()
  {
    $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));

    $pageData = array(
      'title' => 'Request Seller',
      'content' => 'admin/DetailBuyerPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
      "contentData" => ['id_buyer' => $this->input->get()['id_buyer']]
    );
    $this->load->view('Page', $pageData);
  }



  public function kelola_harga_mwp()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Kelola Harga Muntok White Pepper',
      'content' => 'admin/KelolaHargaMWP',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function kelola_standar_mutu()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Kelola Standar Mutu',
      'content' => 'admin/KelolaStandarMutu',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function kelola_jenis_dokumen_perusahaan()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Kelola Dokumen Perusahaan',
      'content' => 'admin/KelolaDokumenPerusahaan',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }
  public function kelola_email()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Kelola Email',
      'content' => 'admin/KelolaEmail',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function news_post()
  {
    $this->SecurityModel->roleOnlyGuard('admin');

    $kode = $this->uri->segment(3);
    $x['data'] = $this->NewsModel->get_berita_by_kode($kode);
    $pageData = array(
      'title' => 'News Post',
      'content' => 'admin/NewsPost',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $pageData['data'] = $x;
    $this->load->view('Page', $pageData);
  }

  public function new_news_post()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'News Post',
      'content' => 'admin/NewNewsPost',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function panduan()
  {
    $this->SecurityModel->roleOnlyGuard('admin');
    $pageData = array(
      'title' => 'Beranda',
      'content' => 'admin/PanduanPage',
      'breadcrumb' => array(
        'Home' => base_url(),
      ),
    );
    $this->load->view('Page', $pageData);
  }

  public function acc_buyer()
  {
    try {
      $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
      $data = $this->input->post();
      $this->BuyerModel->acc_buyer($data);
      $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function acc_seller()
  {
    try {
      $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
      $data = $this->input->post();
      $this->PerusahaanModel->acc_seller($data);
      $this->email_send($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function getAllDBConfig()
  {
    try {
      $this->SecurityModel->rolesOnlyGuard(array('admin', 'kpb'));
      $data = $this->input->post();
      $data = $this->PengirimanModel->getEmailConfig($data);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function email_send($data)
  {
    $serv = $this->PengirimanModel->getEmailConfig();

    $send['to'] = $data['email']; //KPB

    $send['subject'] = 'Verificate Account KPB Lada Babel';
    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#F00000;padding-left:3%"><img src="http://kpbladababel.com/assets/img/logo-kpb.png" width="60px" vspace=0 /></td></tr>';
    $emailContent .= '<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<br>Hallo {$data['nama_perusahaan']},";
    if ($data['verificated'] == 'Y') {
      $emailContent .= "<br>Selamat Akun anda sudah berhasil diverifikasi,
                           anda sudah dapat mengakses halaman Trading Bursa Lada mpms.kpbladababel.com/trading .
                        <br> ";
    } else {
      $emailContent .= "<br>Maaf akun anda belum berhasil diverifikasi,
                           mohon lengkapi data dengan benar agar dapat mengakses halaman Trading Bursa Lada mpms.kpbladababel.com/trading .
                        <br> ";
    }
    $emailContent .= '<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='kpbladababel.com/index.php/login' target='_blank' style='text-decoration:none;color: #60d2ff;'>kpbladababel.com</a></p></td></tr></table></body></html>";
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
    $this->email->send();
    return 0;
  }
}
