<?php 
?>
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
	<script>	
		$(document).ready(function(){
			$('.sub').click(function(){
				$('#main').attr('src',$(this).attr('src'));
			})
		})
	</script>
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
<?php 	foreach($current_pokemon as $key)
		{?>
		<h3><?= $key['name'] ?></h3>
		<div class = 'left'>
<?php 		foreach($current_pokemonpicmain as $pic)
			{?><img class = "block" src="/<?=$pic['filename']?>" id="main">
<?php		}?>			
			<div class = "bottom_left">
<?php			foreach($current_pokemonpic as $row)
				{?>
				<img src="/<?=$row['filename']?>" class="sub">
<?php 			}?>
			</div>
		</div>	
		<div class= "col-md-5 col-md-offset-6">
			<p><?= $key['description']?></p>
			<p>$<?= $key['price']?></p>
<?php		}?>
			<form method = "post" action = "/	addtocart">
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