<?php
class Admin extends CI_Model
{
	function get_orders()
	{
		return $this->db->query("SELECT * FROM orders")->result_array();
	}
	function get_products($num)
	{
		if ($num == 1)
		{
			$num = $num - 1;
		} else {
			$num = ($num - 1) * 3;
		}
		return $this->db->query("SELECT * FROM images LEFT JOIN products ON images.product_id = products.id WHERE main = 1 LIMIT $num,3")->result_array();
	}
	function get_products_count()
	{
		return $this->db->query("SELECT COUNT(*) FROM images LEFT JOIN products ON images.product_id = products.id WHERE main = 1 ORDER BY product_id ASC ")->result_array();
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

	function get_product_by_id($id)
	{
		return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
	}
	function get_product_type($id)
	{
		return $this->db->query('SELECT element.name, product_types.product_id, element.id 
								 FROM product_types 
								 LEFT JOIN `types` AS element 
								 ON product_types.type_id = element.id 
								 WHERE product_types.product_id = ?', array($id))->result_array();
	}
	function get_types()
	{
		return $this->db->query('SELECT * FROM `types`')->result_array();
	}
	function get_product_images($id)
	{
		return $this->db->query('SELECT images.id, images.filename, images.updated_at, images.main  
								 FROM images 
								 WHERE product_id = ?', array($id))->result_array();
	}
	function update_product($product_id, $product_updates)
	{	
		$where = "id = ". $product_id; 
		return $this->db->update('products', $product_updates, $where);
	}

	function add_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required',
											array('required' => 'Product needs a name.')
		);
		$this->form_validation->set_rules('description', 'Description', 'trim|required',
											array('required' => 'Please enter a description.')
		);
		$this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required|greater_than[0]|integer',
											array('required' => 'Please enter an inventory count number.',
												  'greater_than[0]' => 'Inventory count must be greater than 0.',
												  'integer' => 'Inventory count must be a valid integer.')
		);
		$this->form_validation->set_rules('price', 'Price', 'trim|required|decimal',
											array('required' => 'Please enter a price.',
												  'decimal' => 'Please enter a valid price. Must be a decimal number. No dollar sign.')
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
	function add_prod_to_db($post,$filename)
	{
		$query = "INSERT INTO products (name, description, inventory_count, price, inventory_sold, created_at, updated_at, display)
					VALUES (?,?,?,?,?,NOW(),NOW(),?)";
		if($this->input->post('display') == null)
		{
			$display = 1;
		}

		$values = array($this->input->post('name'), $this->input->post('description'), $this->input->post('inventory_count'), $this->input->post('price'), $this->input->post('inventory_sold'), $display);
		$result = $this->db->query($query, $values);
		if($result)
		{
			$query = "INSERT INTO product_types (product_id, type_id, created_at, updated_at)
					  VALUES (?,?, NOW(), NOW())";
			$last_product_id = $this->db->insert_id();
			$values = array($last_product_id, $this->input->post('type'));
			$result = $this->db->query($query,$values);
			if ($result)
			{
				$query = "INSERT INTO images (filename, created_at, updated_at, product_id, main)
						  VALUES(?,NOW(),NOW(),?,?)";
				$values = array($filename, $last_product_id, 1);
				return $this->db->query($query,$values);
			}
			else 
			{
				return false;
			}
		}	
		else 
		{
			return false;
		}
	}
	function delete($id)
	{
		// $this->db->from("images");
		// $this->db->join("products", "images.product_id = products.id");
		// $this->db->join("product_types", "products.id = product_types.product_id");
		// $this->db->where("product_types.product_id", $id);
		// return $this->db->delete("product_types");

		$query = "DELETE FROM images WHERE product_id = $id";
		$result = $this->db->query($query);
		if ($result)
		{
			$query = "DELETE FROM product_types WHERE product_id = $id";
			$result = $this->db->query($query);
			if ($result)
			{
				$query = "DELETE FROM products WHERE id = $id";
				return $this->db->query($query);
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}
?>