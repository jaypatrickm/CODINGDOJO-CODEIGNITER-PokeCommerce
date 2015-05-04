<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"	>
	<title>Product page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
	<style>
	*{
		/*outline: 1px dotted red;*/
	}
	.container{
		width: 970px;
		height: auto;
	}
	.header{
		width: 970px;
		background: black;
		color: white;
		font-family: sans-serif;
		display: inline-block;
	}
		.header h4{
			margin-right: 700px;
			display: inline-block;
		}

	.searchbox{
		width: 200px;
		height: 400px;
		border: 2px solid black;
		margin: 20px 20px 0 20px;
		display: inline-block;
		vertical-align: top;
	}
		.searchbox ul{
			list-style: none;
		}
		.searchbox a{
			text-decoration: none;
		}
	.content{
		width: 680px;
		height: 600px;
		border: 2px solid black;
		display: inline-block;
		margin-top: 20px;
	}
		.content h2{
			margin-right: 300px;
			display: inline-block;
		}
		 #sortbox{
		 	margin-left: 500px;
		 }
		  #sortbox select{
		  	margin: 0;
		  }
	.pagenav{
		width: 300px;
		margin: 70px 0 0 200px;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h4>Dojo eCommerce</h4>
			<span>Shopping cart (5)</span>

		</div>
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
			<a href=""><img src="/assets/images/pikachu.png">Pikachu</a>
			<a href=""><img src="/assets/images/bulbasaur.png">Bulbasaur</a>
			<a href=""><img src="/assets/images/charmander.png">Charmander</a>
			<a href=""><img src="/assets/images/squirtle.png">Squirtle</a>
			<a href=""><img src="/assets/images/jigglypuff.png">Jigglypuff</a>
			<a href=""><img src="/assets/images/sandshrew.png">Sandshrew</a>
			<a href=""><img src="/assets/images/caterpie.png">Caterpie</a>
			<a href=""><img src="/assets/images/weedle.png">Weedle</a>
			<a href=""><img src="/assets/images/poliwag.png">Poliwag</a>
			<a href=""><img src="/assets/images/psyduck.png">Psyduck</a>
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
</body>
</html>