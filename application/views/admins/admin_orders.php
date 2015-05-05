<html>
<head>
	<title>Admin - Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/orders.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php
	require('application/views/partials/adminnav.php');
?>
	<div id="container">
		<div class="row">
			<div class="container">
				<div class ="col-md-3">
					<input type="text" name="search" value="search">
				</div>
				<div class="col-md-9">
					<select>
						<option value="show_All">Show All</option>
						<option value="order_in">Order in</option>
						<option value="process">Process</option>
						<option value="shipped">Shipped</option>
					</select>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Order ID</th>
						<th>Name</th>
						<th>Date</th>
						<th>Billing Address</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
					<tr>
						<td><a href="">100</a></td>
						<td>Bob</td>
						<td>07/21/2015</td>
						<td>2342 West Dojo Way Bellevue WA 98022</td>
						<td>$29.99</td>
						<td>
							<select>
								<option value="shipped">Shipped</option>
								<option value="order_process">Order in progress</option>
								<option value="cancel">Canceled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><a href="">101</a></td>
						<td>James</td>
						<td>07/21/2015</td>
						<td>2342 West Dojo Way Bellevue WA 98022</td>
						<td>$9.97</td>
						<td>
							<select>
								<option value="shipped">Shipped</option>
								<option value="order_process">Order in progress</option>
								<option value="cancel">Canceled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><a href="">103</a></td>
						<td>Sarah</td>
						<td>07/21/2015</td>
						<td>2342 West Dojo Way Bellevue WA 98022</td>
						<td>$29.97</td>
						<td>
							<select>
								<option value="shipped">Shipped</option>
								<option value="order_process">Order in progress</option>
								<option value="cancel">Canceled</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><a href="">104</a></td>
						<td>Zoey</td>
						<td>07/21/2015</td>
						<td>2342 West Dojo Way Bellevue WA 98022</td>
						<td>$219.97</td>
						<td>
							<select>
								<option value="shipped">Shipped</option>
								<option value="order_process">Order in progress</option>
								<option value="cancel">Canceled</option>
							</select>
						</td>
					</tr>
				</table>
				<div id='pagination'>
					<a href=""class = 'padding'>1</a>
					<a href=""class = 'padding'>2</a>
					<a href=""class = 'padding'>3</a>
					<a href=""class = 'padding'>4</a>
					<a href=""class = 'padding'>5</a>
					<a href=""class = 'padding'>6</a>
					<a href=""class = 'padding'>7</a>
					<a href=""class = 'padding'>8</a>
					<a href=""class = 'padding'>9</a>
					<a href=""class = 'padding'>10</a>
					<a href="">-></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>