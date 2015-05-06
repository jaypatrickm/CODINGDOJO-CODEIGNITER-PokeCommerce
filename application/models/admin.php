<?php
class Admin extends CI_Model
{
	function get_orders()
	{
		return $this->db->query("SELECT * FROM orders")->result_array();
	}
	function get_products($num)
	{
		$num = intval($num) - 1;
		return $this->db->query("SELECT * FROM images LEFT JOIN products ON images.product_id = products.id WHERE main = 1 LIMIT $num,5")->result_array();
	}
	function get_products_count()
	{
		return $this->db->query("SELECT COUNT(*) FROM images LEFT JOIN products ON images.product_id = products.id WHERE main = 1")->result_array();
	}
	function get_admin_by_id($id)
	{
		return $this->db->query("SELECT * FROM admins WHERE id = ?", array($id))->row_array();
	}
	function get_user_by_email($post)
	{ 
		$result = $this->db->query("SELECT * FROM admins WHERE email = ?", array($this->input->post('email')))->row_array();
		if ($result)
		{
			$password_test = md5($this->input->post('password') . ' ' . $result['salt']);
			if ($password_test == $result['password'])
			{
				return $result['id'];
			} else 
			{
				$this->session->set_flashdata('errors', 'Password is incorrect.');
				return false;
			}
		}
		else 
		{
			$this->session->set_flashdata('errors', 'Email is not in database, please try a different email.');
			return false;
		}
	}
	function registration_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
											array('required' => 'An email is required to register.',
												  'valid_email' => 'Must enter a valid email address. JSmith@gmail.com')
		);
		$this->form_validation->set_rules('password_register', 'Password', 'trim|required|min_length[8]',
											array('required' => 'Please enter a password.',
												  'min_length[8]' => 'Password must be at least 8 characters.')
											);
		$this->form_validation->set_rules('confirm_password_register', 'Confirm Password', 'trim|required|min_length[8]|matches[password_register]',
											array('required' => 'Please enter a password.',
												  'min_length[8]' => 'Password must be at least 8 characters.',
												  'matches[password_register]' => 'Passwords must match.')
											);
		if($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function register_user($post)
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($this->input->post('password_register') . ' ' . $salt);
		$values = array('email' => $email,
						'password' => $encrypted_password,
						'salt' => $salt
						);
		$query = "INSERT INTO admins (email, password, salt, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
		$result = $this->db->query($query, $values);
		return $result;
	}

	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
											array('required' => 'An email is required to login.',
												  'valid_email' => 'Must enter a valid email address. JSmith@gmail.com')
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
											array('required' => 'Please enter a password.')
		);
		if($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	/*
	function get_all_course()
	{
		return $this->db->query("SELECT * FROM courses")->result_array();
	}
	function get_course_by_id($course_id)
	{
		return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id)->row_array();
	}
	function add_course($course)
	{
		$query - "INSERT INTO Courses (title, description, created_at) VALUES (?,?,?)";
		$values = array($course['title'], $course['description']. date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}*/
}
?>