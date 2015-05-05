<?php
class Admin extends CI_Model
{
	function registration_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admins.username]',
											array('required' => 'Select a username to register.',
												  'is_unique' => 'Username is already in use, please select a different email.')
		);
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
		$password = $this->input->post('password');
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($password . '' . $salt);
		$values = array('username' => $username,
						'email' => $email,
						'password' => $encrypted_password,
						'salt' => $salt
						);
		$query = "INSERT INTO admins (username, email, password, salt, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$result = $this->db->query($query, $values);
		return $result;
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