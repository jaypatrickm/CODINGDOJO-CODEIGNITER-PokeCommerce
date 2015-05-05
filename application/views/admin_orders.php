<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/jQuery-1.11.2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
	<style type="text/css">
		.container-fluid{
			background-color: #800000;
		}

		#container{
			margin-top: 70px;
		}

		input{
			border-radius: 20px;
			margin: 15px;
		}
		.col-md-9{
			text-align: right;
		}
		#pagination{
			text-align: center;
			word-spacing: 30px;
		}
		.padding{
			padding-right: 20px;
			border-right: 3px solid black;
		}
	</style>
<body>
<?php
	require('application/views/partials/adminnav.php');
?>
	<div id="container">
		<div class = "row">
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