<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array("ProductModel", 'NewsModel'));
    $this->load->helper(array('DataStructure', 'Validation'));
    $this->db->db_debug = TRUE;
  }

  public function index()
  {

    $data['product'] = $this->ProductModel->getAll();
    // var_dump($data);
    // die();
    $this->load->view('PublicPage', [
      'title' => "Home",
      'dataContent' => $data,
      'content' => 'public/LandingPage',
    ]);
  }

  public function products()
  {
    $this->load->view('PublicPage', [
      'title' => "Home",
      'content' => 'public/ProductPage',
    ]);
  }

  public function product()
  {
    $input = $this->input->get();
    $data = $this->ProductModel->get($input['id_product']);
    $this->load->view('PublicPage', [
      'title' => "Product {$data['nama_product']}",
      'content' => 'public/DetailProductPage',
      "contentData" => ['id_product' => $input['id_product']]
    ]);
  }

  public function create_account()
  {
    $this->load->view('PublicPage', [
      'title' => "Home",
      'content' => 'public/CreateAccount',
    ]);
  }

  public function checkout()
  {
    $this->SecurityModel->userOnlyGuard(true);
    $pageData = array(
      'title' => 'Checkout',
      'content' => 'user/Checkout',
    );
    $this->load->view('Page', $pageData);
  }

  public function getProduct()
  {
    try {
      $input = $this->input->get();

      $data = $this->ProductModel->getDetailProduct($input);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function cek_ketersediaan_jasa()
  {
    try {
      $input = $this->input->get();

      $data = $this->ProductModel->cek_ketersediaan_jasa($input);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  public function deleteCart()
  {
    try {
      $id = $this->input->get()['id'];

      $data = $this->ProductModel->deleteCart($id);
      $total = $this->total_cart();
      echo json_encode(array("data" => number_format($total, '2')));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  function total_cart()
  {
    $total = 0;
    $final_price = $this->ProductModel->MyCart();
    foreach ($final_price as $s) {
      if ($s['type'] == 'Service') {
        $startTimeStamp = new DateTime($s['from_order']);
        $endTimeStamp = new DateTime($s['to_order']);
        $numberDays =
          $startTimeStamp->diff($endTimeStamp);
        $d =  $numberDays->format('%a');
        $h =  $numberDays->format('%h');
        if ($h > 0) $d = (int)$d + 1;
        $total = $total + ($d * $s['purchase']);
      } else {
        $total = $total + ($s['qyt'] * $s['purchase']);
      };
    }
    return $total;
  }

  public function MyCart()
  {
    // try {

    return $this->ProductModel->MyCart();
    //   echo json_encode($data);
    // } catch (Exception $e) {
    //   ExceptionHandler::handle($e);
    // }
  }

  public function addCart()
  {
    try {
      $input = $this->input->post();
      // echo json_encode($data);

      if (empty($this->session->userdata()['id_user'])) {
        throw new UserException("Harap login terlebih dahulu !", USER_NOT_FOUND_CODE);
      } else {
        $this->ProductModel->cek_ketersediaan_jasa($input);
        $data = $this->ProductModel->getDetailProduct(array('id' => $input['id_items']))[$input['id_items']];
        if ($data['type'] == 'Service') {
          $addData = array(
            'type' => 'Service',
            'product_id' => $data['id'],
            'from_order' => $input['from_order'],
            'to_order' => $input['to_order'],
          );
          $startTimeStamp = new DateTime($input['from_order']);
          // echo $startTimeStamp;
          $endTimeStamp = new DateTime($input['to_order']);
          // $timeDiff = abs($endTimeStamp - $startTimeStamp);
          $numberDays =
            $startTimeStamp->diff($endTimeStamp);
          // $numberDays = intval($numberDays);
          // var_dump($numberDays);
          $d =  $numberDays->format('%a');
          $h =  $numberDays->format('%h');
          if ($h > 0) $d = (int)$d + 1;
          $data['final_price'] = number_format($d * $data['purchase'], '2');
          $data['qyt'] = $d . ' days';
        } else {
          if ($input['qyt'] > 0 && $input['qyt'] <= $data['quantity']) {
            $addData = array(
              'type' => $data['type'],
              'product_id' => $data['id'],
              'qyt' => $input['qyt'],
            );
            $data['qyt'] = $input['qyt'];
            $data['final_price'] = number_format($input['qyt'] * $data['purchase'], '2');
          } else {
            throw new UserException("Stok tidak tersedia !", USER_NOT_FOUND_CODE);
          }
        }
        $this->ProductModel->addCart($addData);
      }
      if ($data['image'] != 'default.jpg') {
        $data['image'] = apps_url() . 'uploads/products/' . $data['image'];
      } else {
        $data['image'] = base_url('assets/images/default.png');
      }
      $data['total'] = number_format($this->total_cart(), '2');

      // $data = $this->ProductModel->cek_ketersediaan_jasa($input);
      echo json_encode(array("data" => $data));
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }
}
