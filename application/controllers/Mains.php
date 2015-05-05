<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{

		$this->load->view('admin_orders');
		//$this->load->view('product_listing');
	}
}

//end of main controller