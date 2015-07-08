<?php date_default_timezone_set('America/Los_Angeles');?>
<table class="table table-bordered">
	<tr>
		<th>Order ID</th>
		<th>Shipping Full Name</th>
		<th>Date</th>
		<th>Billing Address</th>
		<th>Total</th>
		<th>Status</th>
	</tr>
	<?php foreach ($results as $order) { ?>
	<tr>
		<td><a href="/order/<?= $order['id'] ?>"><?= $order['id'] ?></a></td>
		<td><?= $order['ship_first_name'] . ' ' . $order['ship_last_name'] ?></td>
		<td><?= date( "F jS , Y", strtotime($order['created_at'])) ?></td>
		<td><?= $order['bill_address'] ?></td>
		<td><?= $order['total_price'] ?></td>
		<td>
			<select>
				<option value="<?= $order['status']?>"><?= $order['status']?></option>
			</select>
		</td>
	</tr>
	<?php } ?>
</table>
<div id='pagination'>
	<h4>Page:<?php 
	if($results)
	{
		$count = ($results[0]['total']/5); 
			for($i = 0; $i < $count; $i++)
			{?>
			<a href="#" value = "<?= $i * 5 ?>"><?= $i + 1 ?></a>
	<?php   }
	}?>
	</h4>
</div>