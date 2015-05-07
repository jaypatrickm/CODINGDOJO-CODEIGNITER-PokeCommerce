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
					<a class="btn btn-primary" href="/admin/dashboard/products/add" role="button">Add New Product</a>
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
						<td><a class="btn btn-link" href="/admin/dashboard/products/edit/<?= $product['product_id'] ?>" role="button">Edit</a> | <a class="btn btn-link" href="#" role="button">Delete</a></td>
					</tr>
					<?php } ?>
				</table>
				<div id='pagination'>
					<?php 
						for($i=1; $i<=$pages; $i++)
						{
							echo '<a href="/admin/dashboard/products/' . $i . '" class="padding">'. $i .'</a>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>