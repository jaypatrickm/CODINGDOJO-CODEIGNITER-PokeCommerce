<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PokeCommerce</title>
	<meta name = "description" content ="PokeCommerce">
	<!-- Latest compiled and minified CSS --> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
	<link rel="stylesheet" href="/assets/css/products/show.css">
	<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
	<?php
		require('application/views/partials/nav.php');
	?>
	<div class = "container">
		<a href="/">Go back</a>
		<h3>Black Belt for Staff</h3>
		<div class = left>
			<img src="#">
		</div>
		<div class= "col-md-5 col-md-offset-6">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>$5.00</p>
			<form method = "post" action = "addtocart">
				<select name="quantity">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<input type = "submit" value = "Buy">
			</form>
		</div>
		<div class = "col-md-6 col-md-offset-1">
			<h4>Similar Pokemon</h4>
			<img src="#">
			<img src="">
			<img src="">
			<img src="">
		</div>
	</div>
</body>
</html>