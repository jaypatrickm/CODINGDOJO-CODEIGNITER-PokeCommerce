<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/jQuery-1.11.2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<style type="text/css">
		.container-fluid{
			background-color: #800000;
		}

		.container{
			margin-top: 60px;
		}
			#user_info{
				border: 1px solid black;
				height: 500px;
			}
			.space{
				line-height: 40px;
			}
			#status{
				display: inline-block;
				border: 2px solid black;
				background-color: green;
				padding-right: 30px;
			}
			#total{
				display: inline-block;
				border: 2px solid black;
				float: right;
				padding: 15px;
			}
		</style>
</head>
<body>
<?php
	require('application/views/partials/adminnav.php');
?>
	<div class="container">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-md-4">
					<div id="user_info">
						<p>Order ID: 100</p>
						<h4 class="space">Customer Shopping info:</h4>
						<p>Name: bob</p>
						<p>Address: 123 dojo Way</p>
						<p>City: Seattle</p>
						<p>State: WA</p>
						<p>Zipcode: 98322</p>
						<h4 class="space">Customer Shopping info:</h4>
						<p>Name: bob</p>
						<p>Address: 123 dojo Way</p>
						<p>City: Seattle</p>
						<p>State: WA</p>
						<p>Zipcode: 98322</p>
					</div>
				</div>
				<div class="col-md-8">
					<div id="orders">
						<table class="table table-bordered">
							<tr>
								<th>ID</th>
								<th>Item</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>412</td>
								<td>Caterpie</td>
								<td>$19.99</td>
								<td>2</td>
								<td>$39.98</td>
							</tr>
							<tr>
								<td>42</td>
								<td>Pikachu</td>
								<td>$29.99</td>
								<td>1</td>
								<td>$29.99</td>
							</tr>
						</table>
					</div>
					<div id="status">
						<p>Status: Shipped</p>
					</div>
					<div id="total">
						<p>Sub total: $69.97</p>
						<p>Shipping: $8.95</p>
						<p>Total Price: $78.92</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>