<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('main');
		// $this->session->sess_destroy();
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
		$currentpage = array();
		$currentpage = $id;
		$frontproductbyprice = $this->main->loadfrontproductsbyprice($id);
		$alltypes = $this->main->getalltypes();
		$products = array(
			'frontproductbyprice' => $frontproductbyprice,
			'pages' => $pages,
			'alltypes' => $alltypes,
			'currentpage' => $currentpage
			);
		$this->load->view('products/product_listing',$products);
	}
	public function admin_login(){
		$this->load->view('admins/admin_login');
	}

	public function checkout(){
		if($this->session->userdata('carttotal'))
		{
			$this->session->userdata('carttotal');
		}
		else
		{
			$this->session->set_userdata('carttotal',0);
		}
		$total = 0;
		$cartitems = $this->session->userdata('totalcart');
		$this->load->view('products/checkout',array(
			'cartitems' =>$cartitems,
			'total' => $total)
		);
	}
	
	public function buytocart(){

		$quantity = array( 
			'quantity' => $this->input->post('quantity'));
		$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') + $quantity['quantity']);
		$data = array(
			'id' => $this->input->post('pokeid')
			);
		$product = $this->main->getproductbyidforcheckout($data['id']);
		$cartitem = array_merge_recursive($product,$quantity);
		if($this->session->userdata('totalcart'))
		{
			$totalcart = $this->session->userdata('totalcart');
			$updated = false;
			foreach($totalcart as $key => $value)
			{
				if($value['id'] == $cartitem['id'])
				{
					$updated = true;
					$value['quantity'] = intval($value['quantity']) + intval($cartitem['quantity']);
					$totalcart[$key] = array(
						'quantity' => $value['quantity'],
						'id' => intval($value['id']),
						'name' => $value['name'],
						'price' => $value['price']
						);
				}
			}
			if ($updated == false)
			{
				$totalcart[] = $cartitem;
			}
			$this->session->set_userdata('totalcart',$totalcart);
		}
		else
		{
			$this->session->set_userdata('totalcart',array($cartitem));
		}
		redirect('/');
	}

	public function shippingBilling(){
		// test stripe card number: 4242424242424242
		$this->main->checkoutstoreshipandbill($this->input->post());
		$lastorderid = $this->main->retrievelastorderid();
		$this->main->createproductquantitysold($lastorderid,$this->session->userdata('totalcart'));
		$this->session->unset_userdata('totalcart');
		$this->session->unset_userdata('carttotal');
		$this->session->set_flashdata('purchase',"Thank you for your pokepurchase!");
		redirect('/home');
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
	public function getallpoketypes($typeid,$page)
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
		$poketypes = $this->main->getshowtypes($typeid,$page);
		$alltypes = $this->main->getalltypes();
		$getonetype = $this->main->getonetype($typeid);
		$currentpage = array();
		$currentpage = $page;	
		$this->load->view('products/product_listing',array(
			'frontproductbyprice' =>$poketypes,
			'pages' => $pages,
			'alltypes' => $alltypes,
			'getonetype' => $getonetype,
			'page' => $page,
			'currentpage' => $currentpage)
			);
	}
	public function search(){
		$searchterm = $this->input->post('search');
		$searchresult = $this->main->searchpokename($searchterm);
		if (is_null($searchresult))
		{
			$this->session->set_flashdata('search','Cannot find searched pokemans!');
			redirect('/home');
		}
		else
		{
			redirect('/product/' . $searchresult["id"]);
		}
	}
	public function deletecartitem($id){
		$cart =	$this->session->userdata('totalcart');
		foreach($cart as $key => $value) 
		{ 
			if($value['id'] == $id)
			{
				$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') - $value['quantity']);
				unset($cart[$key]);
				$this->session->set_userdata('totalcart',$cart);
			}
		}
		redirect('/checkout');	
	}
	public function updatecartitem($id){
		$cart = $this->session->userdata('totalcart');
		foreach($cart as $key => $value)
		{
			if($value['id'] == $id)
			{
				$pastquantity = $value['quantity'];
				$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') - $pastquantity);
				$this->session->set_userdata('carttotal', $this->session->userdata('carttotal') + $this->input->post('quantity'));
				$cart[$key]['quantity'] = $this->input->post('quantity');
				$this->session->set_userdata('totalcart',$cart);
			}
		}
		redirect('/checkout');
	}
}
//end of main controller