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
      'title' => "Daftar",
      'content' => 'public/CreateAccount',
    ]);
  }

  public function lupa_password()
  {
    $this->load->view('PublicPage', [
      'title' => "Lupa Password",
      'content' => 'public/LupaPassword',
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

  public function payment()
  {
    $this->SecurityModel->userOnlyGuard(true);
    $no = $this->input->get('s');
    $data['parent'] = $this->ProductModel->getInvoice(array('no_invoice' => $no))[0];
    $data['item'] = $this->ProductModel->getItemInvoice(array('id_invoice' => $data['parent']['id']));

    $pageData = array(
      'title' => 'Payment',
      'content' => 'user/Payment',
      'dataContent' => $data,
    );
    $this->load->view('Page', $pageData);
  }

  public function delivery()
  {
    $this->SecurityModel->userOnlyGuard(true);
    $pageData = array(
      'title' => 'Delivery',
      'content' => 'user/Delivery',
    );
    $this->load->view('Page', $pageData);
  }


  public function invoice()
  {
    $this->SecurityModel->userOnlyGuard(true);
    $pageData = array(
      'title' => 'Invoice',
      'content' => 'user/Invoice',
    );
    $this->load->view('Page', $pageData);
  }
  public function invoiceopen()
  {
    $this->SecurityModel->userOnlyGuard(true);
    $filter['no_invoice'] = $this->input->get()['number'];
    if (empty($filter['no_invoice'])) {
      $pageData = array(
        'title' => 'ErrorPage',
        'content' => 'ErrorPage',
      );
      $this->load->view('Page', $pageData);
    } else {
      $data['parent'] = $this->ProductModel->getInvoice($filter)[0];
      $data['item'] = $this->ProductModel->getItemInvoice(array('id_invoice' => $data['parent']['id']));

      $pageData = array(
        'title' => 'Invoice',
        'content' => 'user/InvoiceDetail',
        'dataContent' => $data
      );
      $this->load->view('Page', $pageData);
    }
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


  public function payment_proccess()
  {
    try {
      $this->SecurityModel->userOnlyGuard(true);

      $input = $this->input->post();
      $this->validation_cart();
      $total = 0;
      $final_price = $this->ProductModel->MyCart();
      if (empty($final_price)) {
        throw new UserException("Cart Kosong !!", USER_NOT_FOUND_CODE);
      }
      $i = 0;
      foreach ($final_price as $s) {
        if ($s['type'] == 'Service') {
          $startTimeStamp = new DateTime($s['from_order']);
          $endTimeStamp = new DateTime($s['to_order']);
          $numberDays =
            $startTimeStamp->diff($endTimeStamp);
          $d =  $numberDays->format('%a');
          $h =  $numberDays->format('%h');
          $strstar = strtotime($s['from_order']);
          $strend = strtotime($s['to_order']);
          if ($h > 0) $d = (int)$d + 1;
          $total = $total + ($d * $s['retail']);
          $final_price[$i]['tmp_qyt'] = $d;
        } else {
          $total = $total + ($s['qyt'] * $s['retail']);
          $final_price[$i]['tmp_qyt'] = $s['qyt'];
        };
        $i++;
      }
      $data['qyt'] = $i;
      $data['delivery_method'] = $input['deliveryOption'];
      if ($input['deliveryOption'] == 'pickup') {
        $data['alamat_pengiriman'] = '';
        $data['delivery_price'] = 0;
      } else if ($input['deliveryOption'] == 'outer_prov') {
        $total = $total + 10000000;
        $data['alamat_pengiriman'] = $input['alamat_pengiriman'];
        $data['delivery_price'] = 10000000;
      } else if ($input['deliveryOption'] == 'inner_prov') {
        $total = $total + 2000000;
        $data['alamat_pengiriman'] = $input['alamat_pengiriman'];
        $data['delivery_price'] = 2000000;
      }

      $no_order = $this->ProductModel->count_order_date();
      if (strlen($no_order) == 1)
        $no_order = '00' . $no_order;
      if (strlen($no_order) == 2)
        $no_order = '0' . $no_order;
      $data['total'] = $total;
      $data['invoice_number'] = $no_order . "/SI" . '/' . date('m/y');
      $data['id_user'] = $this->session->userdata()['id_user'];
      // echo json_encode(array("data" => $data));
      $id_invoice = $this->ProductModel->addInvoice($data);

      foreach ($final_price as $s) {
        $this->ProductModel->addOrder($s, $id_invoice);
        if ($s['type'] == 'Service') {
        } else {
          $total = $total + ($s['qyt'] * $s['retail']);
        };
        $i++;
      }

      // $this->ProductModel->clearCart();
      // redirect(base_url('payment?s=' . $no_order));
      // die();
      echo json_encode(array('data' => $data['invoice_number']));

      // $data = $this->ProductModel->cek_ketersediaan_jasa($input);
    } catch (Exception $e) {
      ExceptionHandler::handle($e);
    }
  }

  function validation_cart()
  {
    $this->SecurityModel->userOnlyGuard(true);

    $total = 0;
    $final_price = $this->ProductModel->MyCart();
    $i = 0;
    $arr_id = [];
    $arr_idqyt = [];
    foreach ($final_price as $s) {
      if ($s['type'] == 'Service') {
        $startTimeStamp = new DateTime($s['from_order']);
        $endTimeStamp = new DateTime($s['to_order']);
        $numberDays =
          $startTimeStamp->diff($endTimeStamp);
        $d =  $numberDays->format('%a');
        $h =  $numberDays->format('%h');
        $strstar = strtotime($s['from_order']);
        $strend = strtotime($s['to_order']);
        if ($strstar > $strend) {
          // echo 'tidak valid';
          throw new UserException("Tanggal order Item " . $s['product_name'] . " tidak valid !", USER_NOT_FOUND_CODE);
        }
        foreach ($arr_id as $ar) {
          if ($s['product_id'] == $ar['id']) {
            // echo 'same<br>';
            if ($strstar > $ar['start'] && $strstar < $ar['end']) {
              // echo 'tgl mulai tumburan';
              throw new UserException("Tanggal order Item " . $s['product_name'] . " terjadi kesalahan, harap periksa tanggal order !", USER_NOT_FOUND_CODE);
            }
            if ($strend > $ar['start'] && $strend < $ar['end']) {
              // echo 'tgl End tumburan';
              throw new UserException("Tanggal order Item " . $s['product_name'] . " terjadi kesalahan, harap periksa tanggal order !", USER_NOT_FOUND_CODE);
            }
          }
        }
        array_push($arr_id, array('id' => $s['product_id'], 'start' => $strstar, 'end' => $strend));
        if ($h > 0) $d = (int)$d + 1;
        $total = $total + ($d * $s['retail']);
      } else {
        $co = 0;
        array_push($arr_idqyt, array('id' => $s['product_id']));
        foreach ($arr_idqyt as $ars) {
          if ($s['product_id'] == $ars['id']) {
            $co = $co + $s['qyt'];
            // echo 'same in order ';
            // echo $co;
            // echo '<br>stok = ' . $s['stock'] . '<br>';
            if ($s['stock'] < $co) {
              // echo 'Melebihi Stock';
              throw new UserException("Jumlah order item " . $s['product_name'] . " melebihi batas stock !", USER_NOT_FOUND_CODE);
            }
          }
        }

        $total = $total + ($s['qyt'] * $s['retail']);
      };
    }
    return $total;
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
        $total = $total + ($d * $s['retail']);
      } else {
        $total = $total + ($s['qyt'] * $s['retail']);
      };
    }
    return $total;
  }

  public function MyCart()
  {
    $this->SecurityModel->userOnlyGuard(true);

    return $this->ProductModel->MyCart();
  }

  public function MyInvoice()
  {
    $this->SecurityModel->userOnlyGuard(true);

    echo json_encode($this->ProductModel->MyInvoice());
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
          $data['final_price'] = number_format($d * $data['retail'], '2');
          $data['qyt'] = $d . ' days';
        } else {
          if ($input['qyt'] > 0 && $input['qyt'] <= $data['quantity']) {
            $addData = array(
              'type' => $data['type'],
              'product_id' => $data['id'],
              'qyt' => $input['qyt'],
            );
            $data['qyt'] = $input['qyt'];
            $data['final_price'] = number_format($input['qyt'] * $data['retail'], '2');
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
