<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
	<link rel="stylesheet" href="/assets/css/admin/admin_registration.css">
	<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h2>Register</h2>
			<h3><?= $this->session->flashdata('msg') ?></h3>
			<h3><?= $this->session->flashdata('errors') ?></h3>
			<form action="/admin_register" method="post">
					<div class="form-group">
					<label for="email">Email*</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?= set_value('email') ?>">
					</div>
					<div class="form-group">
					<label for="password_register">Password*</label>
					<input type="password" class="form-control" name="password_register" id="password_register" placeholder="Password">
					</div>
					<div class="form-group">
					<label for="confirm_password_register">Confirm Password*</label>
					<input type="password" class="form-control" name="confirm_password_register" id="confirm_password_register" placeholder="Confirm Password">
					</div>
					<div class="form-group">
					<label for="code">Code*</label>
					<input type="password" class="form-control" name="code" id="code" placeholder="Code From Administrator">
					</div>
					<button type="submit" class="btn btn-default">Register</button>
			</form>
			<a href="/admin" type="submit" class="btn btn-link">Back</button>
		</div>
	</div>
</body>
</html>