<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admins extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->output->enable_profiler();
	}

	public function index()
	{
		if($this->session->userdata('id'))
		{
			redirect('/admin/dashboard');
		} 
		else 
		{
			$this->load->view('admins/admin_login');
		}
	}

	public function login()
	{
		redirect('/admin');
	}

	public function dashboard()
	{
		if ($this->session->userdata('id'))
		{
			$result = $this->admin->get_admin_by_id($this->session->userdata('id'));
			$admin_data = array('admin' => $result);
			$this->load->view('admins/admin_dashboard', $admin_data);
		}
		else
		{
			redirect('/admin');
		}
	}

	public function login_check()
	{
		if ($this->admin->login_validation() == false)
		{
			$error = validation_errors();
			$this->session->set_flashdata('msg', 'Something is not right, could not log in.');
			$this->session->set_flashdata('errors', $error);
			redirect('/admin');
		}
		else 
		{
			$result = $this->admin->get_user_by_email($this->input->post());	
			if($result == false)
			{
				$this->session->set_flashdata('msg', 'Something went wrong, please try logging in again.');
				redirect('/admin');
			}
			else
			{
				$this->session->set_userdata('id', $result);
				redirect('/admin/dashboard');
			}	
		}
	}

	public function admin_registration()
	{
		$this->load->view('admins/admin_registration.php');

	}

	public function register()
	{
		if ($this->admin->registration_validation() == false)
		{
			$error = validation_errors();

			$this->session->set_flashdata('msg', 'Something went wrong, please try registering again.');
			$this->session->set_flashdata('errors', $error);
			redirect('/admin/register');
		}
		else 
		{
			$result = $this->admin->register_user($this->input->post());	
			$error = "Successfully Registered!";
			if($result == false)
			{
				$this->session->set_flashdata('msg', 'Something went wrong, please try registering again.');
				redirect('/admin/register');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Registration submitted! Please Login!');
				redirect('/admin');
			}
				
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('msg', 'You are now logged off. Have a nice day!');
		redirect('/admin');
	}

	public function product()
	{
		if($this->session->userdata('id'))
		{
			$result_count = $this->admin->get_products_count();
			var_dump($result_count);
			foreach ($result_count as $value) {
				$count = $value;
			}
			$int = intval($count);
			$count = $int;
			var_dump($count);
			$result = $this->admin->get_products($count);
			$products = array('products' => $result);
			$this->load->view('admins/admin_products', $products);
		}
		else 
		{
			redirect('/admin');
		}
	}



	public function admin_orders()
	{
		if($this->session->userdata('id'))
		{
			$result = $this->admin->get_orders();
			$orders = array('orders' => $result);
			$this->load->view('admins/admin_orders', $orders);
		}
		else 
		{
			redirect('/admin');
		}
	}

	public function admin_edit_product()
	{
		$this->load->view('admins/admin_edit_product');
	}

}

//end of main controller