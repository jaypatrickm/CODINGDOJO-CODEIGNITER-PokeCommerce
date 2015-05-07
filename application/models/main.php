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
								ON products.id = images.product_id
								GROUP BY name
                                ORDER BY price ")->result_array();
	}
	
	function loadfrontproductsbypopular()
	{
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename, images.product_id
								FROM products
								LEFT JOIN images
								ON products.id = images.product_id
								GROUP BY name
								ORDER BY inventory_sold DESC")->result_array();
	}
	function loadfrontproductsbynewest()
	{
		return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_count, images.filename, images.product_id
								FROM products
								LEFT JOIN images
								ON products.id = images.product_id
								GROUP BY name
								ORDER BY products.id DESC")->result_array();
	}
	function getproductbyid($id)
	{
		return $this->db->query("SELECT products.id, products.name, products.price, products.inventory_count, products.description
								FROM products
								WHERE products.id = ?",array($id))->result_array();
	}
	function getproductpicbyid($id)
	{
		return $this->db->query("SELECT * FROM images
								 WHERE product_id = ?",array($id))->result_array();
	}
	function getproductmainpic($id)
	{
		return $this->db->query("SELECT * FROM images
								WHERE images.product_id = $id
								AND main = 1 ")->result_array();
	} 
	function shipping($shipBill){
		$query = "INSERT INTO shippings (first_name, last_name, address, city, state, zipcode, created_at, updated_at) 
		VALUES (?,?,?,?,?,?, NOW(), NOW())";
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