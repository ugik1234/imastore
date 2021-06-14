<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

  public function __construct(){
    parent::__construct();
		$this->load->model(array("CategoryModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }
  
  public function getAllCategory(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CategoryModel->getAllCategory($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function getAllSubCategory(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CategoryModel->getAllSubCategory($this->input->get());
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function get(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->CategoryModel->get($this->input->get()['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function add(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_mutu'] = $this->CategoryModel->add($data);
      $data = $this->CategoryModel->get($data['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
  
  public function edit(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_jenis_mutu'] = $this->CategoryModel->edit($data);
      $data = $this->CategoryModel->get($data['id_jenis_mutu']);
			echo json_encode(array("data" => $data));
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }

  public function delete(){
    try{
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->CategoryModel->delete($this->input->post());
			echo json_encode([]);
    } catch (Exception $e){
      ExceptionHandler::handle($e);
    }
  }
}