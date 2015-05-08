<html>
<head>
	<title>Admin - Edit</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/edit_product.css">
		<link rel="stylesheet" href="/assets/css/main.css">
		<script>
		$(document).ready(function() {
			$('input:checkbox').on('click', function(){
				if($(this).is(":checked"))
				{
					$(this).parent().siblings().children('input').attr("checked", false);
					$(this).attr("checked", true);
				}
			});
		})
		</script>
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
	<div class="container">
		<h2>Edit Product - ID <?= $product['id'] ?></h2>
		<form action="" method="post">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" rows="10" cols="10" id="description" name="description"><?= $product['description'] ?></textarea>
			</div>

			<?php
				// foreach ($product_type as $product_type_key => $product_type_value) 
				// 				{
				// 						var_dump($product_type_key);
				// 						var_dump($product_type_value);
				// 						echo '<h1>hello</h1>';
				// 				}
					// var_dump($product_type_key);
					// 					echo $i;
					// 				if ($product_type_key == $i)
					// 				{
										
					// 				}
			?>
			<?php 
			for($i=0;$i<$type_count;$i++)
			{
			?>
			<div class="form-group">
				<label for="description">Type</label>
				<select class="form-control">
				<?php 
					foreach ($types as $type) 
					{ 
						foreach ($type as $key => $name) 
						{ 
							if ($key == 'name')
							{ 
								$is_type = false;
								foreach ($product_type as $product_type_key => $product_type_value) 
								{
									if ($product_type_key == $i)
									{
										foreach ($product_type_value as $product_types_key => $product_types_value) 
										{
											if ($name == $product_types_value)
											{
											?>
												<option value="<?= $name ?>" selected><?= $name ?></option>

											<?php
												$is_type = true;
											}
											
										}
									}
								}
								if($is_type == false)
								{
							?>	
								<option value="<?= $name ?>"><?= $name ?></option>
							<?php 
								}
							}
						}	
				 	} 
				?>
				</select>
			</div>
			<?php	
			}
			?>
			<div class="form-group">
				<label for="new_type">Add New Type</label>
				<input type="text" class="form-control" id="new_type" name="new_type" placeholder="New Type">
				<button type="button" class="btn btn-warning add_type_btn">Add Type</button>
			</div>
			<div class="form-group">
			<label class="image-label" for="main">Images (Select Main)</label>
			<?php
				foreach ($product_images as $product_image_key => $product_image_value) 
				{
					$main = 0;
					if ( $product_image_value['main'] == 1 )
					{
						?>
						<label>
							<img class="pokemon img-thumbnail" src="/<?= $product_image_value['filename'] ?>" alt="pokemon" title="pokemon">	
							<input class="radio" type="checkbox" checked> 
							<a href="/edit/delete/image/<?= $product_image_value['id']?>" class="btn btn-link">Delete</a>
						</label>
						<?php
					}
					else 
					{
						?>
						<label>
							<img class="pokemon img-thumbnail" src="/<?= $product_image_value['filename'] ?>" alt="pokemon" title="pokemon">	
							<input class="radio" type="checkbox"> 
							<a href="/edit/delete/image/<?= $product_image_value['id']?>" class="btn btn-link">Delete</a>
						</label>
						<?php
					}
				}
			?>
			</div>
			<div class="form-group">
				<label for="add_image">Add Image</label>
				<input type="file" name="userfile" id="add_image">
				<p class="help-block">Select an image for upload.</p>
			</div>
			<a href="/admin/dashboard/products" class="btn btn-default" name="back">Go back</a>
			<button class="btn btn-success" name="preview">Preview</button>
			<input type="submit" class="btn btn-primary">
		</form>
	</div>
</body>
</html>