<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('product_listing');
	}

	public function admin_login(){
		$this->load->view('admin_login');
	}

	public function show_product(){
		$this->load->view('includes/show');
	}

	public function checkout(){
		$this->load->view('checkout');
	}

	public function admin_orders(){
		$this->load->view('admin_orders')
	}
}

//end of main controller