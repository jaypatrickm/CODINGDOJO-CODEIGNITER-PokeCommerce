<html>
<head>
	<title>Admin - Products</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/products.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
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
						<th>Picture</th>
						<th>ID</th>
						<th>Name</th>
						<th>Inventory Count</th>
						<th>Quantity Sold</th>
						<th>Action</th>
					</tr>
					<?php foreach ($products as $product) { ?>
					<tr>
						<td><img src="\<?= $product['filename'] ?>" alt="<?= $product['name']?>" title="<?= $product['name']?>" /></td>
						<td><?= $product['product_id'] ?></td>
						<td><?= $product['name'] ?></td>
						<td><?= $product['inventory_count'] ?></td>
						<td><?= $product['inventory_sold'] ?></td>
						<td><a class="btn btn-link" href="#" role="button">Edit</a> | <a class="btn btn-link" href="#" role="button">Delete</a></td>
					</tr>
					<?php } ?>
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