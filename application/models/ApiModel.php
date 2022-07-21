<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiModel extends CI_Model
{

    public function login($email)
    {
        return  $this->db->get_where('mp_user_customer', ['email' => $email])->result_array();
    }
}
