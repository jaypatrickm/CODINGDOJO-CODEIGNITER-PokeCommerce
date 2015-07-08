<?php date_default_timezone_set('America/Los_Angeles'); ?>
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
		<script>
		$(document).ready(function(){
				$('form').on('change', function(data){
					$.ajax({
						url: "/products",
						method: 'post',
						data: $(this).serialize()
						}).done(function(data){
							$('#table_spot').html(data);
						})
						return false;
				})
				$('#search').keyup(function(data){
					var page_num = 0;
					$('#page_number').attr('value',page_num);
					$.ajax({
						url: "/products",
						method: 'post',
						data: $('form').serialize()
						}).done(function(data){
							$('#table_spot').html(data);
						})
						return false;					
				})
			$(document).on('click', 'a', function(){
				var page_num = $(this).attr('value');
				$('#page_number').attr('value', page_num);
				$('form').trigger('change');
			})
		});
		</script>
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
	<div id="container">
		<div class="row">
			<div class="container">
				<div class ="col-md-3">
					<form action = 'products' method = 'post'>
						<input type="text" name="search" placeholder="search" id="search">
						<input type="hidden" id="page_number" name="page_number" value='0'>
					</form>
					<h3><?= $this->session->flashdata('msg') ?></h3>
					<h3><?= $this->session->flashdata('errors') ?></h3>
				</div>
				<div class="col-md-9">
					<a class="btn btn-primary" href="/admin/dashboard/products/add" role="button">Add New Product</a>
				</div>
				<div id ="table_spot">
<?					require('application/views/partials/admin_products_partial.php') ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>