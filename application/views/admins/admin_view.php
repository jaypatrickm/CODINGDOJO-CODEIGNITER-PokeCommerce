<html>
<head>
	<title>Admin - Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/view.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php
	require('application/views/partials/adminnav.php');
?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-4" id="orderview">
				<h2>Order ID: <?= $orderinfo['id']?> </h2>
				<h3>Customer Shipping Info: </h3>
				<h4>Name: <?= $orderinfo['ship_first_name'] . ' ' . $orderinfo['ship_last_name'] ?></h4>
				<h4>Address: <?= $orderinfo['ship_address'] ?></h4>
				<h4>City: <?= $orderinfo['ship_city'] ?></h4>
				<h4>State: <?= $orderinfo['ship_state'] ?></h4>
				<h4>Zip: <?= $orderinfo['ship_zipcode'] ?></h4>

				<h3>Customer Billing Info: </h3>
				<h4>Name: <?= $orderinfo['bill_first_name'] . ' ' . $orderinfo['bill_last_name'] ?></h4>
				<h4>Address: <?= $orderinfo['bill_address'] ?></h4>
				<h4>City: <?= $orderinfo['bill_city'] ?></h4>
				<h4>State: <?= $orderinfo['bill_state'] ?></h4>
				<h4>Zip: <?= $orderinfo['bill_zipcode'] ?></h4>
			</div>
			<div class="col-md-7">
				<table class="table">
					<tr class="danger">
						<th>ID</td>
						<th>Item</td>
						<th>Price</td>
						<th>Quantity</td>
						<th>Total</td>
					</tr>
						<? foreach ($productinfo as $productinfos){?>
					<tr class="warning">
						<td><?= $productinfos['id']?></td>
						<td><?= $productinfos['name']?></td>
						<td>$<?= $productinfos['price']?></td>
						<td><?= $productinfos['quantity_sold']?></td>
						<td>$<?= $productinfos['price'] * $productinfos['quantity_sold']?></td>
<?						}?>
					</tr>
				</table>
				<div class="row">
					<div class="col-md-3" id="orderviewstatus">
						<h4>Status: <?= $orderinfo['status']?></h4>
					</div>
					<div class="col-md-offset-8" id="orderviewtotal">
						<p>Sub Total: $<?= $orderinfo['total_price']?></p>
						<p>Shipping: $0.00</p>
						<p>Total Price: $<?= $orderinfo['total_price']?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>