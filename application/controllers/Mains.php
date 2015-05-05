<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('main');
	}

	public function index()
	{
		// $this->load->view('admin_orders');
		//$this->load->view('product_listing');
		if($this->session->userdata('carttotal'))
		{
			$this->session->userdata('carttotal');
		}
		else
		{
			$this->session->set_userdata('carttotal',0);
			break;
		}
		// $this->load->view('admin_orders');
		//$this->load->view('product_listing');
		$frontproductbyprice = $this->main->loadfrontproductsbyprice();
			$this->load->view('products/product_listing',array(
				'frontproductbyprice' => $frontproductbyprice)
			);
		$this->load->view('products/product_listing');
	}

	public function admin_login(){
		$this->load->view('admins/admin_login');
	}

	public function show_product(){
		$this->load->view('products/show');
	}

	public function checkout(){
		$cartitems = $this->main->get_cart();
		$this->load->view('products/checkout',array(
			'cartitems' =>$cartitems)
		);
		public function buytocart(){

		$quantity =  $this->input->post('quantity');
		$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') + $quantity);
		redirect('product');
	}
}

//end of main controller