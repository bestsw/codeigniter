<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Shopping extends CI_Controller {

   private $update_cart_data = array();

   public function __construct() {
      parent::__construct();
      $this->load->library('cart');
      $this->load->model('billing_model');
   }

   public function index() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/home', $data);
   }
   
   
   public function products() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/products', $data);
   }
   
   public function products_detail() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/products_detail', $data);
   }
   
   public function checkout() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/checkout', $data);
   }
    
   public function cart() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/cart', $data);
   }
   
   public function login() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/login', $data);
   }
   
   public function blog() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/blog', $data);
   }
   
   public function blog_single() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/blog_single', $data);
   }
   
   public function contact() {
      $data['products'] = $this->billing_model->get_all();
      $this->load->view('eshopper/contact', $data);
   }
//   public function index() {
//      $data['products'] = $this->billing_model->get_all();
//      $this->load->view('shopping_view', $data);
//   }
//
//   function add() {
//      $cart = $this->cart->contents();
//      $new_cart = array();
//      if ($cart) {
//         foreach ($cart as $rowid => $v) {
//            $new_cart[$v['id']] = $v + array('rowid' => $rowid);
//         }
//      }
//      $id = $this->input->post('id');
//      if ($new_cart[$id]) {
//         $new_cart[$id]['qty'] += 1;
//         $this->update_cart_data = $new_cart[$id];
//         $this->fn_update_cart();
//      } else {
//         $insert_data = array(
//            'id' => $this->input->post('id'),
//            'name' => $this->input->post('name'),
//            'price' => $this->input->post('price'),
//            'qty' => 1
//         );
//         $this->cart->insert($insert_data);
//      }
////      redirect('shopping');
//   }
//
//   function remove($rowid) {
//      if ($rowid === "all") {
//         $this->cart->destroy();
//      } else {
//         $data = array(
//            'rowid' => $rowid,
//            'qty' => 0
//         );
//         $this->cart->update($data);
//      }
//      redirect('shopping');
//   }
//
//   function update_cart() {
//      $cart_info = $_POST['cart'];
//      foreach ($cart_info as $cart) {
//         $this->update_cart_data = $cart;
//         $this->fn_update_cart();
//      }
//      redirect('shopping');
//   }
//
//   function billing_view() {
//      $this->load->view('billing_view');
//   }
//
//   public function save_order() {
//      $customer = array(
//         'name' => $this->input->post('name'),
//         'email' => $this->input->post('email'),
//         'address' => $this->input->post('address'),
//         'phone' => $this->input->post('phone')
//      );
//      $cust_id = $this->billing_model->insert_customer($customer);
//
//      $order = array(
//         'date' => date('Y-m-d'),
//         'customerid' => $cust_id
//      );
//
//      $ord_id = $this->billing_model->insert_order($order);
//      $cart = $this->cart->contents();
//      if ($cart) {
//         foreach ($cart as $item) {
//            $order_detail = array(
//               'orderid' => $ord_id,
//               'productid' => $item['id'],
//               'quantity' => $item['qty'],
//               'price' => $item['price']
//            );
//            $cust_id = $this->billing_model->insert_order_detail($order_detail);
//         }
//      }
//      $this->load->view('billing_success');
//   }
//
//   function fn_update_cart() {
//      $cart = $this->update_cart_data;
//      $rowid = $cart['rowid'];
//      $price = $cart['price'];
//      $amount = $price * $cart['qty'];
//      $qty = $cart['qty'];
//      $data = array(
//         'rowid' => $rowid,
//         'price' => $price,
//         'amount' => $amount,
//         'qty' => $qty
//      );
//
//      $this->cart->update($data);
//   }

}
