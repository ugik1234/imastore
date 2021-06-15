<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

  public function getAll($filter = [])
  {
    //   $this->db->select("pro.*, ekr.nama_seller");

    //   $nama_role = !empty($this->session->userdata()['nama_role']) ? $this->session->userdata()['nama_role'] : NULL;
    //   $id_seller = !empty($this->session->userdata()['id_seller']) ? $this->session->userdata()['id_seller'] : NULL;
    //   $this->db->select("@seller := '{$id_seller}' = pro.id_seller", FALSE);
    //   $this->db->select("IF(!@seller, 'Bukan Perusahaan', NULL ) as edit_seller_pr");
    //   $this->db->from("product as pro");
    //   $this->db->join("seller as ekr", "ekr.id_seller = pro.id_seller");
    //   if(!empty($filter['id_seller'])) $this->db->where('pro.id_seller', $filter['id_seller']);
    //   if(!empty($filter['id_product'])) $this->db->where('pro.id_product', $filter['id_product']);
    //   if(!empty($filter['featured'])){
    //     $this->db->limit(4);
    //   }
    $this->db->select('mp_productslist.*,mp_category.category_name,mp_brand.name');
    $this->db->from('mp_category');
    $this->db->join('mp_productslist', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    // $res = $this->db->get();

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }


  public function getInvoice($filter = [])
  {
    $this->updateExpaid();

    $this->db->select('*');
    $this->db->from('store_invoice');
    // $this->db->join('mp_productslist', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    // $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    $this->db->where('id_user', $this->session->userdata('id_user'));
    $this->db->where('invoice_number like "' . $filter['no_invoice'] . '"');
    // $res = $this->db->get();

    $res = $this->db->get();
    // echo json_encode($res->result_array());
    // die();
    return $res->result_array();
  }

  function updateExpaid()
  {
    $now = new DateTime();
    $date = $now->modify('-1 day')->format('Y-m-d H:i:s');
    $this->db->set('status', 'expaired');
    $this->db->where('status', 'unpaid');
    $this->db->where('order_date <', $date);
    // if (!empty($data['cover_product'])) $this->db->set('cover_product', !empty($data['cover_product']) ? $data['cover_product'] : NULL);
    // $this->db->set('attachment_product', !empty($data['attachment_product']) ? $data['attachment_product'] : NULL);
    $this->db->update('store_invoice');
    // ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");

    // return $data['id_product'];
  }

  public function getItemInvoice($filter = [])
  {

    $this->db->select('mp_order.*, mp_productslist.image');
    $this->db->from('mp_order');
    $this->db->join('mp_productslist', 'mp_order.product_id = mp_productslist.id');
    // $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    $this->db->where('customer_id', $this->session->userdata('id_user'));
    $this->db->where('invoice_id', $filter['id_invoice']);
    // $res = $this->db->get();

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }


  function cek_ketersediaan_jasa($filter)
  {
    $this->db->select('*');

    $this->db->from('mp_order');

    if (!empty($filter['id'])) $this->db->where('product_id', $filter['id']);
    if (!empty($filter['from'])) $this->db->where('from_order', $filter['from']);
    if (!empty($filter['to'])) $this->db->where('to_order', $filter['to']);

    $res = $this->db->get();
    if (empty($res->result_array())) {
      return 'tersedia';
    } else {
      throw new UserException("Sudah ada order pada tanggal tersebut", USER_NOT_FOUND_CODE);
    }
    // return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function getDetailProduct($filter = [])
  {
    $this->db->select('mp_productslist.*,mp_category.category_name,mp_brand.name');
    $this->db->from('mp_category');
    $this->db->join('mp_productslist', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    // $res = $this->db->get();
    if (!empty($filter['id'])) $this->db->where('mp_productslist.id', $filter['id']);

    $res = $this->db->get();
    return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function MyCart()
  {
    $this->db->select('mp_category.category_name, mp_cart.*, mp_productslist.product_name, mp_productslist.purchase , mp_productslist.quantity as stock , mp_productslist.image');
    $this->db->from('mp_cart');
    $this->db->join('mp_productslist', 'mp_productslist.id = mp_cart.product_id');
    $this->db->join('mp_category', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    // $res = $this->db->get();
    if (!empty($filter['id'])) $this->db->where('mp_productslist.id', $filter['id']);
    $this->db->where('mp_cart.id_user', $this->session->userdata()['id_user']);

    $res = $this->db->get();
    return $res->result_array();
    // return DataStructure::keyValue($res->result_array(), 'id');
  }


  public function MyInvoice()
  {
    $this->db->select('*');
    $this->db->from('store_invoice');
    // $this->db->join('mp_productslist', 'mp_productslist.id = mp_cart.product_id');
    // $this->db->join('mp_category', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    // $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    // $res = $this->db->get();
    if (!empty($filter['id'])) $this->db->where('mp_productslist.id', $filter['id']);
    $this->db->where('store_invoice.id_user', $this->session->userdata()['id_user']);

    $res = $this->db->get();
    return $res->result_array();
    // return DataStructure::keyValue($res->result_array(), 'id');
  }


  public function count_order_date()
  {
    $this->db->select('count(*) as c');
    $this->db->from('store_invoice');
    // $this->db->join('mp_productslist', 'mp_productslist.id = mp_cart.product_id');
    // $this->db->join('mp_category', 'mp_category.id = mp_productslist.category_id and mp_productslist.status != 2');
    // $this->db->join('mp_brand', "mp_brand.id = mp_productslist.brand_id");
    // $res = $this->db->get();
    // if (!empty($filter['id'])) $this->db->where('mp_productslist.id', $filter['id']);
    $this->db->where('order_date >= ', date('Y-m') . '-1');

    $res = $this->db->get();
    return $res->result_array()[0]['c'] + 1;
    // return DataStructure::keyValue($res->result_array(), 'id');
  }

  public function deleteCart($id)
  {
    $this->db->where('id', $id);
    $this->db->where('id_user', $this->session->userdata()['id_user']);
    $this->db->delete('mp_cart');

    // $this->record_activity(array('jenis' => 6, 'sub_id' => $id, 'desk' => 'Delete Invoice'));
  }

  public function clearCart()
  {
    // $this->db->where('id', $id);
    $this->db->where('id_user', $this->session->userdata()['id_user']);
    $this->db->delete('mp_cart');

    // $this->record_activity(array('jenis' => 6, 'sub_id' => $id, 'desk' => 'Delete Invoice'));
  }



  public function get($id = NULL)
  {
    $row = $this->getAll(['id_product' => $id]);
    if (empty($row)) {
      throw new UserException("Product yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
    }
    return $row[$id];
  }

  public function add_product_img($data)
  {
    $this->db->insert('product_img', DataStructure::slice($data, ['product_img_file', 'id_product', 'product_img_ket']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

    return $this->db->insert_id();
  }


  public function add($data)
  {
    $this->db->insert('product', DataStructure::slice($data, ['id_seller']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

    return $this->db->insert_id();
  }

  public function addCart($data)
  {
    $data['id_user'] = $this->session->userdata()['id_user'];
    $this->db->insert('mp_cart', DataStructure::slice($data, ['id_user', 'type', 'product_id', 'from_order', 'to_order', 'qyt']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Product gagal", "product");

    return $this->db->insert_id();
  }

  public function addInvoice($data)
  {
    $this->db->select('*');
    $this->db->from('mp_user_customer');
    $this->db->where('id_user', $this->session->userdata()['id_user']);

    $res = $this->db->get();
    $order_name = $res->result_array()[0];
    $data['id_user'] = $this->session->userdata()['id_user'];
    $data['order_no_telp'] = $order_name['no_telp'];
    $data['order_email'] = $order_name['email'];
    $data['order_company_name'] = $order_name['company_name'];
    $data['order_name'] = $order_name['nama'];
    $data['order_alamat'] = $order_name['alamat'];
    // $data['order_name'] = $order_name['nama'];
    $data['ip_address'] = $this->input->ip_address();
    // echo json_encode($data);
    // die();
    $this->db->insert('store_invoice', DataStructure::slice($data, [
      'id_user', 'total', 'delivery_method', 'invoice_number', 'alamat_pengiriman', 'qyt', 'ip_address', 'order_name', 'order_no_telp', 'order_email', 'order_company_name', 'order_alamat', 'delivery_price'
    ]));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Invoice", "delivery");

    return $this->db->insert_id();
  }

  public function addOrder($data, $id)
  {
    $data['customer_id'] = $this->session->userdata()['id_user'];
    // $data['product_id'] = $data['prod'];
    $data['invoice_id'] = $id;
    $data['qyt'] = $data['tmp_qyt'];
    $data['unit_price'] = $data['purchase'];
    $data['sub_total'] = $data['tmp_qyt'] * $data['purchase'];
    // echo json_encode($data);
    // die();
    $this->db->insert('mp_order', DataStructure::slice($data, ['invoice_id', 'product_name', 'category_name', 'customer_id', 'product_id', 'type', 'from_order', 'to_order', 'alamat_pengiriman', 'qyt', 'unit_price', 'sub_total']));
    ExceptionHandler::handleDBError($this->db->error(), "Tambah Invoice", "delivery");

    return $this->db->insert_id();
  }

  public function edit($data)
  {
    $this->db->where('id_product', $data['id_product']);
    if (!empty($data['cover_product'])) $this->db->set('cover_product', !empty($data['cover_product']) ? $data['cover_product'] : NULL);
    // $this->db->set('attachment_product', !empty($data['attachment_product']) ? $data['attachment_product'] : NULL);
    $this->db->update('product', DataStructure::slice($data, ['nama_product', 'deskripsi_product', 'stock', 'category', 'sub_category', 'price'], TRUE));
    ExceptionHandler::handleDBError($this->db->error(), "Edit Product gagal", "product");

    return $data['id_product'];
  }

  public function delete($data)
  {
    $this->db->where('id_product', $data['id_product']);
    $this->db->delete('product');
    ExceptionHandler::handleDBError($this->db->error(), "Hapus Product", "Product");
  }
  public function delete_image($data)
  {
    $this->db->where('id_product_img', $data['id_product_img']);
    $this->db->delete('product_img');
    ExceptionHandler::handleDBError($this->db->error(), "Hapus Img Product", "Product");
  }
}
