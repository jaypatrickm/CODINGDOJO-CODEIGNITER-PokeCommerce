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
		redirect('/home');
	}
	public function products($id)
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
		}
		// $this->load->view('admin_orders');
		//$this->load->view('product_listing');

		$result_count = $this->main->loadfrontproductscountall();
		$count = 0;
		foreach ($result_count as $key)
		{
			foreach ($key as $int)
			{
				$count = intval($int);
			}
		}
		$pages = $count /9;
		$pages = ceil($pages);
		$frontproductbyprice = $this->main->loadfrontproductsbyprice($id);
		$alltypes = $this->main->getalltypes();
		$products = array(
			'frontproductbyprice' => $frontproductbyprice,
			'pages' => $pages,
			'alltypes' => $alltypes
			);
		$this->load->view('products/product_listing',$products);
	}
	public function admin_login(){
		$this->load->view('admins/admin_login');
	}

	public function checkout(){
		$cartitems = $this->main->get_cart();
		$this->load->view('products/checkout',array(
			'cartitems' =>$cartitems)
		);
	}
	
	public function buytocart(){

		$quantity =  $this->input->post('quantity');
		$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') + $quantity);
		redirect('/');
	}

	public function shippingBilling(){
		// $this->main->shipping($this->input->post());
		// $this->main->billing($this->input->post());
		// redirect('/');
	}
	public function show_product($id){
		$current_pokemon = $this->main->getproductbyid($id);
		$current_pokemonpic = $this->main->getproductpicbyid($id);
		$current_pokemonpicmain = $this->main->getproductmainpic($id);
		$similar = $this->main->getsimilarids($id);
		if(array_key_exists(1, $similar))
		{
			$typeid1 = $similar[0]['type_id'];
			$pokeid = $similar[0]['id'];
			$poketype1 = $this->main->getsimilartypes($pokeid,$typeid1);
			$typeid2 = $similar[1]['type_id'];
			$poketype2 = $this->main->getsimilartypes($pokeid,$typeid2);
			$this->load->view('products/show',array(
				'current_pokemon' => $current_pokemon,
				'current_pokemonpic' => $current_pokemonpic,
				'current_pokemonpicmain' => $current_pokemonpicmain,
				'poketype1' => $poketype1,
				'poketype2' => $poketype2)
			);
		}
		else
		{
			$typeid1 = $similar[0]['type_id'];
			$pokeid = $similar[0]['id'];
			$poketype1 = $this->main->getsimilartypes($pokeid,$typeid1);
			$this->load->view('products/show',array(
				'current_pokemon' => $current_pokemon,
				'current_pokemonpic' => $current_pokemonpic,
				'current_pokemonpicmain' => $current_pokemonpicmain,
				'poketype1' => $poketype1)
			);
		}
	}
	public function getallpoketypes($typeid)
	{
		$result_count = $this->main->loadtypeproductscount($typeid);
		$count = 0;
		foreach ($result_count as $key)
		{
			foreach ($key as $int)
			{
				$count = intval($int);
			}
		}
		$pages = $count /9;
		$pages = ceil($pages);
		$poketypes = $this->main->getshowtypes($typeid);
		$alltypes = $this->main->getalltypes();
		$this->load->view('products/product_listing',array(
			'frontproductbyprice' =>$poketypes,
			'pages' => $pages,
			'alltypes' => $alltypes)
			);
	}
}

//end of main controller