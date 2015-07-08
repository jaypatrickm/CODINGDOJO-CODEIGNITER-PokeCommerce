<html>
<head>
	<title>Admin - Delete Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/add_product.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Delete Product</h2>
				<h3>Are you sure you want to delete this?</h3>
				<h3>Deleting cannot be undone.</h3>
				<h3><?= $this->session->flashdata('msg') ?></h3>
				<h3><?= $this->session->flashdata('errors') ?></h3>
				<h3>Id</h3>
				<h4><?= $product['id'] ?></h4>
				<h3>Name</h3>
				<h4><?= $product['name'] ?></h4>
				<h3>Description</h3>
				<h4><?= $product['description'] ?></h4>
				<form action="/admin/delete_product/<?= $product['id'] ?>" method="post">
				  <button type="submit" class="btn btn-danger">Delete</button>
				</form>
				<a class="btn btn-link" href="/admin/dashboard/products" role="button">Back</a>
			</div>
		</div>
	</div>
</body>
</html>