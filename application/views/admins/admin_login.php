<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/admin_login.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4>Admin Login Page</h4>
				<h3><?= $this->session->flashdata('msg') ?></h3>
				<h3><?= $this->session->flashdata('errors') ?></h3>
				<a class="btn btn-link" href="/admin/register" role="button">No account yet? Register here.</a>
				<form action ="/admin_login" method="post">
					<div class="form-group">
						<label for="admin_login_email">Email address</label>
					    <input type="email" class="form-control" id="admin_login_email" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="admin_login_password">Password</label>
						<input type="password" class="form-control" id="admin_login_password" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> 
			</div>
		</div>
	</div>
</body>
</html>