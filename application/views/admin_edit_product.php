<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/jQuery-1.11.2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<style type="text/css">
		.container{
			
		}
		</style>
</head>
<body>
	<div class="container">
		<h2>Edit Product - ID 41</h2>
		<form action="" method="post">
			<p>Name:<input type="text" name="productname"></p>
			Description:<p><textarea name="description" rows="4" cols="30"></textarea></p>
			<p>
				Categories:
				<select name="category">
					<option></option>
					<option value="fire">Fire</option>
					<option value="water">Water</option>
					<option value="flying">Flying</option>
					<option value="psychic">Psychic</option>
					<option value="grass">Grass</option>
				</select>
			</p>
			<p>or Add new category:<input type="text" name="category"></p>
			<p>
				Images: <input type="file" name="image1">
					    <input type="file" name="image2">
						<input type="file" name="image3">
			</p>
			<button class="btn btn-default" name="back">Go back</button>
			<button class="btn btn-success" name="preview">Preview</button>
			<input type="submit" class="btn btn-primary">
		</form>
	</div>
</body>
</html>