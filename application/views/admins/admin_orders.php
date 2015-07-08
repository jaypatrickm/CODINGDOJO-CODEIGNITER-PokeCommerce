<html>
<head>
	<title>Admin - Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/angular.min.js"></script>
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/orders.css">
		<link rel="stylesheet" href="/assets/css/main.css">
		<script>
		$(document).ready(function(){
				$('form').on('change', function(data){
					$.ajax({
						url: "/orders",
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
						url: "/orders",
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
<?php
	require('application/views/partials/adminnav.php');
?>
	<div id="container">
		<div class="row">
			<div class="container">
				<div class ="col-md-3">
					<form action = 'orders' method = 'post'>
						<input type="text" name="search" placeholder="search" id="search">
						<input type="hidden" id="page_number" name="page_number" value='0'>
					</form>
				</div>
				<div class="col-md-9">
					<select>
						<option value="show_All">Show All</option>
						<option value="ordered">Ordered</option>
						<option value="shipped">Shipped</option>
						<option value="canceled">Canceled</option>
					</select>
				</div>
				<div id ="table_spot">
					<?php require('application/views/partials/admin_orders_partial.php') ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>