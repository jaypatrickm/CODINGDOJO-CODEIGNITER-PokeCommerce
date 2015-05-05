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
						<li><a href="">T shirts(25)</a></li>
						<li><a href="">Shoes(35)</a></li>
						<li><a href="">Cups(5)</a></li>
						<li><a href="">Fruits(105)</a></li>
						<li><a href=""><i>Show all</i></a></li>
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
					<a href="product"><img src="/assets/images/pikachu.png">Pikachu</a>
					<a href="product"><img src="/assets/images/bulbasaur.png">Bulbasaur</a>
					<a href="product"><img src="/assets/images/charmander.png">Charmander</a>
					<a href="product"><img src="/assets/images/squirtle.png">Squirtle</a>
					<a href="product"><img src="/assets/images/jigglypuff.png">Jigglypuff</a>
					<a href="product"><img src="/assets/images/sandshrew.png">Sandshrew</a>
					<a href="product"><img src="/assets/images/caterpie.png">Caterpie</a>
					<a href="product"><img src="/assets/images/weedle.png">Weedle</a>
					<a href="product"><img src="/assets/images/poliwag.png">Poliwag</a>
					<a href="product"><img src="/assets/images/psyduck.png">Psyduck</a>
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