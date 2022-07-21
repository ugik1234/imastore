<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MitraController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('SecurityModel', 'MitraModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
        $this->db->db_debug = false;
        $this->SecurityModel->userOnlyGuard();
    }

    public function index($act = null)
    {
        $data = array();
        $res = $this->MitraModel->getAll(array('id_user' => $this->session->userdata('id_user')));
        if (!empty($res[$this->session->userdata('id_user')])) {
            $data['return'] = $res[$this->session->userdata('id_user')];
            if ($act != null) {
                if ($data['return']['status'] == 0)
                    $page = 'mitra/request';
                else
                    $page = 'mitra/menu';
            } else {
                $data['return'] = $res[$this->session->userdata('id_user')];
                $page = 'mitra/detail';
            }
        } else {
            $page = 'mitra/request';
        }
        // echo json_encode($data);
        // die();
        $this->load->view('PublicPage', [
            'title' => "Home",
            'dataContent' => $data,
            'content' => $page,
        ]);
    }

    public function daftar()
    {
        $this->load->view('PublicPage', [
            'title' => "Home",
            'content' => 'public/LandingPage',
        ]);
    }

    public function request()
    {
        $data = $this->input->post();
        $old_data = $this->MitraModel->getAll(array('id_user' => $this->session->userdata('id_user')));
        if (!empty($_FILES['upload_pengaju']['name'])) {
            $data['file_pengaju'] = FileIO::imaUpload('upload_pengaju', 'file_pengaju', 'jpeg|jpg|png', NULL, $data);
        }
        if (!empty($_FILES['upload_nib']['name'])) {
            $data['file_nib'] = FileIO::imaUpload('upload_nib', 'file_nib', 'pdf', NULL, $data);
        }
        if (!empty($_FILES['upload_persyaratan']['name'])) {
            $data['file_persyaratan'] = FileIO::imaUpload('upload_persyaratan', 'file_persyaratan', 'pdf', NULL, $data);
        }
        if (!empty($old_data)) {
            $old_data = $old_data[$this->session->userdata('id_user')];
            if ($old_data['status'] != 1) {
                // $data['id_mitra'] 
                $this->MitraModel->request_edit($data);
            }
        } else
            $this->MitraModel->request($data);
        echo json_encode($data);
    }
}
