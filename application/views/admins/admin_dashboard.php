<html>
<head>
	<title>Admin - Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/admin/dashboard.css">
		<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<?php require('application/views/partials/adminnav.php'); ?>
	<div id="container">
		<div class="row">
			<div class="container">
				<div class="col-sm-4">
					<h3>Welcome</h3> <h4><?= $admin['email'] ?></h4>
					<p>What would you like to do ?</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>