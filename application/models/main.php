<?php
class Main extends CI_Model
{
	function get_cart()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
	}

	function loadfrontproductsbyprice()
	{
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename, images.product_id
								FROM products
								LEFT JOIN images
								ON products.id = images.product_id")->result_array();
	}
	
	function loadfrontproductsbypopular()
	{
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename, images.product_id
								FROM products
								LEFT JOIN images
								ON products.id = images.product_id")->result_array();
	}

	function shipping($shipBill){
		$query = "INSERT INTO shippings (first_name, last_name, address, address2, city, state, zipcode, created_at, updated_at) 
		VALUES (?,?,?,?,?,?,?, NOW(), NOW())";
		$values = array($shipBill['ship_firstname'], $shipBill['ship_lastname'], $shipBill['ship_address1'], $shipBill['ship_address2'], 
			$shipBill['ship_city'], $shipBill['ship_state'], $shipBill['ship_zipcode']);

		return $this->db->query($query, $values);
	}

	function billing($shipBill){
		$query = "INSERT INTO billings (first_name, last_name, address, city, state, zip,
		created_at, updated_at) VALUES (?,?,?,?,?,?,NOW(), NOW())";
		$values = array($shipBill['bill_firstname'], $shipBill['bill_lastname'], $shipBill['bill_address1'], 
			$shipBill['bill_city'], $shipBill['bill_state'], $shipBill['bill_zipcode']);
		return $this->db->query($query, $values);
	}

}
?>