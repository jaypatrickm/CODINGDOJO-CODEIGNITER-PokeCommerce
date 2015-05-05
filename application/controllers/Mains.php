<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		// $this->load->view('admin_orders');
		//$this->load->view('product_listing');
		$this->load->view('products/product_listing');
	}

	public function admin_login(){
		$this->load->view('admins/admin_login');
	}

	public function show_product(){
		$this->load->view('products/show');
	}

	public function checkout(){
		$this->load->view('products/checkout');
	}

	public function admin_orders(){
		$this->load->view('admins/admin_orders');
	}

	public function admin_edit_product(){
		$this->load->view('admins/admin_edit_product');
	}
}

//end of main controller