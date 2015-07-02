<html>
<head>
	<title>Check Out</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
		<link rel="stylesheet" href="/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
		<link rel="stylesheet" href="/assets/css/products/checkout.css">
		<link rel="stylesheet" href="/assets/css/main.css">
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script>
			$(document).ready(function(){
				$('#same_address').on("change",function(){
					if(this.checked){
						$("[name='bill_firstname']").val($("[name='ship_firstname']").val());
						$("[name='bill_lastname']").val($("[name='ship_lastname']").val());
						$("[name='bill_address1']").val($("[name='ship_address1']").val());
						$("[name='bill_city']").val($("[name='ship_city']").val());
						$("[name='bill_state']").val($("[name='ship_state']").val());
						$("[name='bill_zipcode']").val($("[name='ship_zipcode']").val());
					}
				$('#payment-form').submit(function(event){
				var $form = $(this);
				console.log($this);
				// Disable the submit button to prevent repeated clicks
				$form.find('button').prop('disabled', true);
				Stripe.card.createToken($form, stripeResponseHandler);
				// Prevent the form from submitting with the default action
				return false;
				});
				});
			});
		Stripe.setPublishableKey('pk_test_tAa4asVHn9WlRlN4NfRTu8AC');
		</script>
</head>
<body>
<?php
	require('application/views/partials/nav.php');
?>
 	<div id="container">
		<div id = "cart">
			<div class = "row">
				<div class="container">
					<table class="table table-bordered">
						<tr class = "success">
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
<? if (isset($cartitems)){?>
	<? foreach($cartitems as $key => $value){ 
		$totalprice = $value['quantity'] * $value['price']?>
						<tr class= "danger">
							<td><?= $value['name']?></td>
							<td><?= $value['price']?></td>
							<td class="space"><?= $value['quantity']?>
								<form class="noblock" action="/addmore/<?= $value['id'] ?>" method="post">
									<input type="submit" value="Update" class="btn btn-warning">
								</form>								 
								<a href="/destroy/<?= $value['id'] ?>"><button class="btn btn-danger">Delete</button></a>
							</td>
							<td><?= $totalprice ?></td>
						</tr>
<? } ?>	
<? } ?>
					</table>
<? if (isset($cartitems)){?>
<? foreach($cartitems as $key => $value){ 
	$total += $value['price'] * $value['quantity'];
}	
	}?>

					<h4 class="right">Total: $<?= $total?></h4>
					<form action="/" class="right">
						<input type="submit" value="Continue Shopping" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>
		<div id="customer_info">
			<div class="row-fluid">
				<div class="col-md-offset-2">
					<h1>Shipping Information</h1>
					<form action="shippingBilling" method="post">
						<p>First Name:<input type="text" name="ship_firstname"></p>
						<p>Last Name:<input type="text" name="ship_lastname"></p>
						<p>Address:<input type="text" name="ship_address1"></p>
						<p>Address2:<input type="text" name="ship_address2"></p>
						<p>City:<input type="text" name="ship_city"></p>
						<p>State:<input type="text" name="ship_state"></p>
						<p>Zipcode<input type="text" name="ship_zipcode"></p>
					<h1>Billing Information</h1>
						<input type="checkbox" id="same_address">Same as Shipping information
						<p>First Name:<input type="text" name="bill_firstname"></p>
						<p>Last Name:<input type="text" name="bill_lastname"></p>
						<p>Address:<input type="text" name="bill_address1"></p>
						<p>City:<input type="text" name="bill_city"></p>
						<p>State:<input type="text" name="bill_state"></p>
						<p class="line_space">Zipcode<input type="text" name="bill_zipcode"></p>
						<input type="submit" value="Pay" class="btn btn-info">
					  <span class="payment-errors"></span>

					  <div class="form-row">
					    <label>
					      <span>Card Number</span>
					      <input type="text" size="20" data-stripe="number"/>
					    </label>
					  </div>

					  <div class="form-row">
					    <label>
					      <span>CVC</span>
					      <input type="text" size="4" data-stripe="cvc"/>
					    </label>
					  </div>

					  <div class="form-row">
					    <label>
					      <span>Expiration (MM/YYYY)</span>
					      <input type="text" size="2" data-stripe="exp-month"/>
					    </label>
					    <span> / </span>
					    <input type="text" size="4" data-stripe="exp-year"/>
					  </div>

					  <button type="submit">Submit Payment</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>