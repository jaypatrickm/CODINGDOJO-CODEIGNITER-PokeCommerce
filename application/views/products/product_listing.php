<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"	>
	<title>Product page</title>
	<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
	<link rel="stylesheet" href="/assets/css/products/products_listing.css">
	<link rel="stylesheet" href="/assets/css/main.css">
	<style>
	
	</style>
</head>
<body>
<?php
	require('application/views/partials/nav.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="searchbox">
					<h4>Categories</h4>
					<ul>
						<li><a href="">Fire</a></li>
						<li><a href="">Electric</a></li>
						<li><a href="">Grass</a></li>
						<li><a href="">Poison</a></li>
						<li><a href="">Water</a></li>
						<li><a href="">Normal</a></li>
						<li><a href="">Poison</a></li>
					</ul>
				</div>
			</div>
			<div clas="col-sm-9">
				<div class="content">
					<h2>Tshirts(page 2)</h2>
					<a href="">first</a>
					<a href="">prev</a>
					<span>2</span>
					<a href="">next</a>
					<div id="sortbox">
						Sorted by<select name="sort" id="sort">
							<option value="price">Price</option>
							<option value="mostpopular">Most Popular</option>
							<option value="Newest">Newest</option>
						</select>
					</div>
<?php 				foreach($frontproductbyprice as $key)
					{?>
					<p>
						<a href="product/<?=$key['id']?>"><img src="<?=$key['filename']?>"><?=$key['name']?></a>
						$<?=$key['price']?>
					</p>
<?php				}?>
					<div class="pagenav">
						<a href="">1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<a href="">5</a>
						<a href="">6</a>
						<a href="">7</a>
						<a href="">8</a>
						<a href="">9</a>
						<a href="">10</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>