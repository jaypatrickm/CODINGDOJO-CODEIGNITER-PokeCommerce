<?php
class Main extends CI_Model
{
	function get_cart()
	{
		return $this->db->query("SELECT * FROM products")->result_array();
	}

	function loadfrontproductsbyprice($num)
	{
		if ($num == 1)
		{
			$num = $num - 1;
		} else {
			$num = ($num - 1) * 9;
		}
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename, images.product_id
								FROM products
								LEFT JOIN images
								ON products.id = images.product_id
                                WHERE products.display = 1
								GROUP BY name
                                LIMIT $num,9")->result_array();
	}
	function loadfrontproductscountall()
	{
		return $this->db->query("SELECT COUNT(*) FROM images LEFT JOIN products ON images.product_id = products.id WHERE main = 1 ORDER BY product_id ASC ")->result_array();
	}
	function loadtypeproductscount($typeid)
	{
		return $this->db->query("SELECT COUNT(*) 
					FROM products
					LEFT JOIN images
					ON products.id = images.product_id
					LEFT JOIN product_types
					ON products.id = product_types.product_id
					LEFT JOIN types
					ON product_types.type_id = types.id
					WHERE main = 1 AND types.id = ?",array($typeid))->result_array();
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
	function getproductbyidforcheckout($id)
	{
		return $this->db->query("SELECT products.id, products.name, products.price
								FROM products
								WHERE products.id = ?",array($id))->row_array();
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
	function getalltypes()
	{
		return $this->db->query("SELECT * FROM types")->result_array();	
	}
	function getonetype($id)
	{
		return $this->db->query("SELECT * FROM types WHERE id = ?",array($id))->result_array();	
	}
	function getsimilarids($id)	
	{
		return $this->db->query("SELECT products.id, types.id as type_id, types.name
					FROM products
					LEFT JOIN images
					ON products.id = images.product_id
					LEFT JOIN product_types
					ON products.id = product_types.product_id
					LEFT JOIN types
					ON product_types.type_id = types.id
					WHERE images.main = 1 AND products.id = ?",array($id))->result_array();
	}
	function getsimilartypes($productid,$typeid)
	{
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename,types.name
					FROM products
					LEFT JOIN images
					ON products.id = images.product_id
					LEFT JOIN product_types
					ON products.id = product_types.product_id
					LEFT JOIN types
					ON product_types.type_id = types.id
					WHERE images.main = 1 AND types.id = ? AND products.id != ?",array($typeid,$productid))->result_array();
	}
	function getshowtypes($typeid,$num)
	{
		if ($num == 1)
		{
			$num = $num - 1;
		} else {
			$num = ($num - 1) * 9;
		}
		return $this->db->query("SELECT products.id, products.name, products.price, images.filename, images.product_id, types.name as 'type', types.id as 'type_id'
				FROM products
				LEFT JOIN images
				ON products.id = images.product_id
				LEFT JOIN product_types
				ON products.id = product_types.product_id
				LEFT JOIN types
				ON product_types.type_id = types.id
				WHERE images.main = 1 AND types.id = ?
				GROUP BY name
	            ORDER BY price
	            LIMIT ?,9",array($typeid,$num))->result_array();
	}
	function searchpokename($name)
	{
		return $this->db->query("SELECT products.id
								 FROM products
								 WHERE products.name = ?",array($name))->row_array();
	}
	function checkoutstoreshipandbill($data)
	{
		$query = "INSERT INTO orders (total_price, status, created_at, updated_at, ship_first_name, ship_last_name, ship_address, ship_city, ship_state ,ship_zipcode, bill_first_name, bill_last_name, bill_address, bill_city, bill_state, bill_zipcode) VALUES (?,'Ordered',NOW(),NOW(),?,?,?,?,?,?,?,?,?,?,?,?)";
		$values = array($data['total_price'], $data['ship_firstname'], $data['ship_lastname'], $data['ship_address'], $data['ship_city'],$data['ship_state'], $data['ship_zipcode'], $data['bill_firstname'], $data['bill_lastname'], $data['bill_address'], $data['bill_city'], $data['bill_state'], $data['bill_zipcode']);
		return $this->db->query($query, $values);
	}
	function retrievelastorderid()
	{
		return $this->db->query("SELECT id FROM pokecommerce_schema.orders
								 ORDER BY id DESC
								 LIMIT 1")->row_array();
	}
	function createproductquantitysold($orderid,$cartdata)
	{
		foreach ($cartdata as $key => $value) 
		{
			$query = "INSERT INTO product_quantity_sold (order_id, product_id, quantity_sold, created_at, updated_at)
						VALUES (?,?,?,NOW(),NOW())";
			$values = array($orderid['id'], $value['id'], $value['quantity']);
			$this->db->query($query,$values);
		}
	}
}
?>