<div class="orderTypes view">
<h2><?php  echo __('Order Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderType['OrderType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($orderType['OrderType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Type'), array('action' => 'edit', $orderType['OrderType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Type'), array('action' => 'delete', $orderType['OrderType']['id']), null, __('Are you sure you want to delete # %s?', $orderType['OrderType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($orderType['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Type Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('User Ecurr Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Payment Method Id'); ?></th>
		<th><?php echo __('Order Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($orderType['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['order_type_id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['user_ecurr_id']; ?></td>
			<td><?php echo $order['product_id']; ?></td>
			<td><?php echo $order['quantity']; ?></td>
			<td><?php echo $order['price']; ?></td>
			<td><?php echo $order['payment_method_id']; ?></td>
			<td><?php echo $order['order_status_id']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
