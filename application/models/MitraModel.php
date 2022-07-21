<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MitraModel extends CI_Model
{
    public function getAll($filter = [])
    {
        // echo json_encode($filter);
        // die();
        $this->db->select("*");

        $this->db->from('mitra_tambang as u');
        $this->db->join('ref_jenis_mitra as jm', 'u.jenis_mitra = jm.id_jenis_mitra');
        if (!empty($filter['id_user'])) {
            $this->db->where("id_user", $filter['id_user']);
        }
        $res = $this->db->get();
        // var_dump($res->result_array());
        // die();
        return DataStructure::keyValue($res->result_array(), 'id_user');
    }
    public function request($data)
    {
        $data['id_user'] = $this->session->userdata('id_user');
        $this->db->insert('mitra_tambang', DataStructure::slice($data, ['id_user', 'nomor_nib', 'jenis_mitra', 'file_nib', 'file_persyaratan', 'file_pengaju'], true));
        ExceptionHandler::handleDBError($this->db->error(), "Reqeust gagal", "mitra");
        return $this->db->insert_id();
    }
    public function request_edit($data)
    {
        $data['id_user'] = $this->session->userdata('id_user');
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('mitra_tambang', DataStructure::slice($data, ['id_user', 'nomor_nib', 'jenis_mitra', 'file_nib', 'file_persyaratan', 'file_pengaju'], true));
        ExceptionHandler::handleDBError($this->db->error(), "Reqeust gagal", "mitra");
        return $this->db->insert_id();
    }
}
