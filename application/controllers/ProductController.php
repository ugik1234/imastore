<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array("ProductModel"));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }

  public function detail()
  {
    $this->SecurityModel->userOnlyGuard();
    $input = $this->input->get();
    $data = $this->ProductModel->get($input['id_product']);
    $pageData = array(
      'title' => "Product {$data['nama_product']}",
      'content' => 'DetailProductPage',
      "contentData" => ["showBackBtn" => true, 'id_product' => $input['id_product']]
    );
    $this->load->view('Page', $pageData);
  }

  public function getAll()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ProductModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getAllMyProduct()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ProductModel->getAll($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function getImageProduct()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ProductModel->getImageProduct($this->input->get());
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function get()
  {
    try {
      // $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->ProductModel->get($this->input->get()['id_product']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function add()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();
      $data['id_product'] = $this->ProductModel->add($data);
      $data = $this->ProductModel->get($data['id_product']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function edit()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();

      $dataOld = $this->ProductModel->get($data['id_product']);
      $data['cover_product'] = FileIO::genericUpload('cover_product',  array('png', 'jpeg', 'jpg'), $dataOld, $data);
      $data['attachment_product'] = FileIO::genericUpload('attachment_product', 'pdf', $dataOld, $data);
      $data['id_product'] = $this->ProductModel->edit($data);
      $data = $this->ProductModel->get($data['id_product']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }



  public function add_product_img()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $data = $this->input->post();

      // $dataOld = $this->ProductModel->get($data['id_product']);
      $data['product_img_file'] = FileIO::genericUpload('product_img_file', array('png', 'jpeg', 'jpg'), null , $data);
      // $data['attachment_product'] = FileIO::genericUpload('attachment_product', 'pdf', $dataOld, $data);
      $data['id_product_img'] = $this->ProductModel->add_product_img($data);
      // $data = $this->ProductModel->get($data['id_product']);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }


  public function delete()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->ProductModel->delete($this->input->post());
      echo json_encode([]);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function delete_image()
  {
    try {
      $this->SecurityModel->userOnlyGuard(TRUE);
      $this->ProductModel->delete_image($this->input->post());
      $data = FileIO::delete('uploads/product_img_file/img1.jpg"');
      echo json_encode($data);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
}
