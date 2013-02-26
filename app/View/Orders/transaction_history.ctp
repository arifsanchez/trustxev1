<?php echo $this->Search->searchForm('Order', array('legend' => 'Search', "updateDivId" => "updateOrder")); ?>
<h2><span>Transaction History</span></h2>

<div class="row-fluid">
	<div class="span12 well">
	<table cellpadding="0" cellspacing="0">
	 <tr>
			<th><?php echo $this->Paginator->sort('order_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_ecurr_id'); ?></th>
			
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_method_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<thead>
			<tr>
				<th><?php echo __('SL');?></th>
				<th><?php echo $this->Paginator->sort('User.id', __('User Id')); ?></th>
				<th><?php echo $this->Paginator->sort('User.first_name', __('Name')); ?></th>
				<th><?php echo $this->Paginator->sort('User.username', __('Username')); ?></th>
				<th><?php echo $this->Paginator->sort('User.email', __('Email')); ?></th>
				<th><?php echo __('Groups(s)');?></th>
				<th><?php echo $this->Paginator->sort('User.email_verified', __('Email Verified')); ?></th>
				<th><?php echo $this->Paginator->sort('User.active', __('Status')); ?></th>
				<th><?php echo $this->Paginator->sort('User.created', __('Created')); ?></th>
				<th style="width:150px;"><?php echo __('Action');?></th>
			</tr>
		</thead>
	<?php
	foreach ($orders as $order): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['UserEcurr']['id'], array('controller' => 'user_ecurrs', 'action' => 'view', $order['UserEcurr']['id'])); ?>
		</td>
		
		<td><?php echo h($order['Order']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
</div>

<!--div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('order_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_ecurr_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_method_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($orders as $order): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['UserEcurr']['id'], array('controller' => 'user_ecurrs', 'action' => 'view', $order['UserEcurr']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Product']['name'], array('controller' => 'products', 'action' => 'view', $order['Product']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id'])); ?>
		</td>
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		$this->Paginator->options(array(
		    'update' => '#content',
		    'evalScripts' => true,
		    'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
		    'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
		));
	?>
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Html->image('loading-indicator.gif', array('id' => 'busy-indicator'));
	?>
	</div>
	
</div-->

<?php 
	#echo $this->element('user_sidebar_panel');
	#echo $this->Js->writeBuffer(); 
?>