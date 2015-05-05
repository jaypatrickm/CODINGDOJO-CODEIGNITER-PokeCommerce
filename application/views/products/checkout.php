<html>
<head>
	<title>Check Out</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/products/checkout.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php
	require('application/views/partials/nav.php');
?>
	<div id="container">
		<div id = "cart">
			<div class = "row">
				<div class="container">
					<table class="table table-bordered">
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
						<tr>
							<td>Pikachu</td>
							<td>$19.99</td>
							<td class="space">2 <a href="">update</a></td>
							<td>$29.97</td>
						</tr>
						<tr>
							<td>Chamander</td>
							<td>$9.99</td>
							<td class="space">1 <a href="">update</a></td>
							<td>$9.99</td>
						</tr>
						<tr>
							<td>Mew</td>
							<td>$34.99</td>
							<td class="space">1 <a href="">update</a></td>
							<td>$34.99</td>
						</tr>
					</table>
					<h4 class="right">Total: $64.97</h4>
					<form action="/" class="right">
						<input type="submit" value="Continue Shopping" class="btn btn-success">
					<form>
				</div>
			</div>
		</div>
		<div id="customer_info">
			<div class="row-fluid">
				<div class="col-md-offset-2">
					<h1>Shipping Information</h1>
					<form action="" method="post">
						<p>First Name:<input type="text" name="ship_firstname"></p>
						<p>Last Name:<input type="text" name="ship_lastname"></p>
						<p>Address:<input type="text" name="ship_address1"></p>
						<p>Address2:<input type="text" name="ship_address2"></p>
						<p>City:<input type="text" name="ship_city"></p>
						<p>State:<input type="text" name="ship_state"></p>
						<p>Zipcode<input type="text" name="ship_zipcode"></p>
					<h1>Billing Information</h1>
						<input type="checkbox" value="same_address">Same as Shipping information
						<p>First Name:<input type="text" name="bill_firstname"></p>
						<p>Last Name:<input type="text" name="bill_lastname"></p>
						<p>Address:<input type="text" name="bill_address1"></p>
						<p>Address2:<input type="text" name="bill_address2"></p>
						<p>City:<input type="text" name="bill_city"></p>
						<p>State:<input type="text" name="bill_state"></p>
						<p class="line_space">Zipcode<input type="text" name="bill_zipcode"></p>
						<p>Card:<input type="text" name="card_num"></p>
						<p>Security Code:<input type="text" name="card_security"></p>
						<p>Expiration:<input type="text" name="card_exp_month" size="1">/<input type="text" name="card_exp_year" size="1"></p>
						<input type="submit" value="Pay" class="btn btn-info">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>