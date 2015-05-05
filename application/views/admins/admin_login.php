<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/admin_login.css">
</head>
<body>
<?php
	require('application/views/partials/adminnav.php');
?>
	<div class="container">
		<h4>Admin login Page</h4>
		<form action ="admin_orders" method="post">
		<p>Email:<input type="text" name="email"></p>
		<p>Password:<input type="text" name="password"></p>
		<input type="submit" value="Login" class="btn btn-primary">
		</form> 
	</div>
</body>
</html>