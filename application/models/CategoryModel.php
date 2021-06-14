<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {

  public function getAllCategory($filter = []){
    $this->db->select('eks.*');
    $this->db->from("category as eks");
    if(!empty($filter['id_category'])) $this->db->where('eks.id_category', $filter['id_category']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_category');
  }

  public function getAllSubCategory($filter = []){
    $this->db->select('eks.*');
    $this->db->from("sub_category as eks");
    if(!empty($filter['id_category'])) $this->db->where('eks.id_category', $filter['id_category']);
    if(!empty($filter['id_sub_category'])) $this->db->where('eks.id_sub_category', $filter['id_sub_category']);
    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id_sub_category');
  }
  
	public function getCategory($id = NULL){
    $row = $this->getAllCategory(['id_category' => $id]);
		if (empty($row)){
			throw new UserException("Jenis Mutu yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }

  
	public function getSubCategory($id = NULL){
    $row = $this->getAllSubCategory(['id_sub_category' => $id]);
		if (empty($row)){
			throw new UserException("Jenis Mutu yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$id];
  }
  
	public function add($data){
    $this->db->insert('category', DataStructure::slice($data, ['nama_category', 'kapasitas']));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah Jenis Mutu gagal", "category");
		
		return $this->db->insert_id();
  }
  
	public function edit($data){
    $this->db->where('id_category', $data['id_category']);
    $this->db->update('category', DataStructure::slice($data, ['nama_category', 'kapasitas'], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Edit Jenis Mutu gagal", "category");
		
		return $data['id_category'];
  }
  
	public function delete($data){
		$this->db->where('id_category', $data['id_category']);
		$this->db->delete('category');

    ExceptionHandler::handleDBError($this->db->error(), "Hapus Jenis Mutu", "category");
  }
}
