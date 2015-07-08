<?php date_default_timezone_set('America/Los_Angeles');?>
<table class="table table-bordered">
	<tr>
		<th>Picture</th>
		<th>ID</th>
		<th>Name</th>
		<th>Inventory Count</th>
		<th>Quantity Sold</th>
		<th>Action</th>
	</tr>
	<?php foreach ($products as $product) { ?>
	<tr>
		<td><img src="\<?= $product['filename'] ?>" alt="<?= $product['name']?>" title="<?= $product['name']?>" /></td>
		<td><?= $product['product_id'] ?></td>
		<td><?= $product['name'] ?></td>
		<td><?= $product['inventory_count'] ?></td>
		<td><?= $product['inventory_sold'] ?></td>
		<td><a class="btn btn-link" href="/admin/dashboard/products/edit/<?= $product['product_id'] ?>" role="button">Edit</a> | <a class="btn btn-link" href="/admin/dashboard/products/delete/<?= $product['product_id'] ?>" role="button">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<div id='pagination'>
	<h4>Page:<?php 
	if($products)
	{
		$count = ($products[0]['total']/3); 
			for($i = 0; $i < $count; $i++)
			{?>
			<a href="#" value = "<?= $i * 3 ?>"><?= $i + 1 ?></a>
	<?php   }
	}?>
	</h4>
</div>