<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Users extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(array('ApiModel'));
    }

    public function login_post()
    {
        $loginData['email'] = $this->post('email');
        $loginData['password'] = $this->post('password');

        $user = $this->ApiModel->login($loginData['email']);
        if (!empty($user[0])) {
            if ($user[0]['email'] == $loginData['email'] &&  $user[0]['password'] == md5($loginData['password'])) {
                $this->response([
                    'error' => false,
                    'message' => '',
                    'data' => $user[0]
                ], 200);
            } else {
                $this->response([
                    'error' => true,
                    'message' => 'Password salah !!',
                ], 404);
            }
        } else {
            $this->response([
                'error' => true,
                'message' => 'Email tidak ditemukan !!',
            ], 404);
        }
    }
}
