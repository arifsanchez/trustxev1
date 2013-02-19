<legend>Daily Rates</legend>

<?php $product = $this->requestAction('products/index'); ?>
<table class="table">
	<tr>
		<th>Product</th>
		<th>Buying</th>
		<th>Selling</th>
	</tr>

<?php foreach ($product as $product): ?>
	<tr>
		<td><?php echo $product['Product']['name']; ?></td>
		<td><?php echo $product['Product']['buy']; ?></td>
		<td><?php echo $product['Product']['sell']; ?></td>
	</tr>
<?php endforeach; ?>
</table>


