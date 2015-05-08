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
	<script type="text/javascript">
		$(document).ready(function(){
		});
	</script>
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
<?php 					foreach($alltypes as $key)
						{?>
						<li><a href="/products/types/<?=$key['id']?>" id="<?=$key['name']?>"><?=$key['name']?></a></li>
<?php					}?>
						<li><a href="/" id="all">Show All</a></li>
					</ul>
				</div>
			</div>
			<div clas="col-sm-9">
				<div class="content">
					<div id="sortbox">
						Sorted by<select name="sort" id="sort">
							<option value="price">Price</option>
							<option value="mostpopular">Most Popular</option>
							<option value="Newest">Newest</option>
						</select>
					</div>
<?php 				shuffle($frontproductbyprice);
					$count = 0;
					foreach($frontproductbyprice as $key)
					{
						if($count == 0 && isset($key['type']))
							{?>
					<h2 id="type"><?= $key['type'] . ' ' . 'Types' ?></h2>
					<a href="">prev</a>
					<span>1</span>
					<a href="">next</a>
<?php						}
						if($count == 0 && !isset($key['type']))
							{?>
					<h2 id="type"><?= "All Pokemans" ?></h2>
					<a href="">prev</a>
					<span>1</span>
					<a href="">next</a>
<?php 						}?>
					<p>
						<a href="/product/<?=$key['id']?>"><img src="/<?=$key['filename']?>"><?=$key['name']?></a>
						$<?=$key['price']?>
						<input type= "hidden" name="page_number" value = "0">
					</p>
<?php				$count++;
					}?>
					<div class="pagenav">
<?php 				if(array_key_exists("type", $frontproductbyprice[0]))
					{
						foreach($alltypes as $key)
						{
							for($i=1; $i<=$pages;$i++)
							{?>
						<a href="/products/<?=$key['type']?>/<?=$i?>"><?=$i?></a>
<?php						}
						}
					}
					else
					{
						for($i=1; $i<=$pages;$i++)
						{?>						
						<a href="/products/<?=$i?>"><?=$i?></a>
<?php					}
					}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>