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
}
?>