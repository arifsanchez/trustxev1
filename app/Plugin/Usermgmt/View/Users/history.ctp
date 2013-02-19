
<h2><span>Transaction History</span></h2>

<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
	
	<div class="span8 well">
	<table  class="table table-striped">
	 <caption>...</caption>
	  <thead>
	<tr>
			<th><strong><h4>order</h4></strong></th>
			<th><strong><h4>product</h4></strong></th>
			<th><strong><h4>quantity</h4></strong></th>
			<th><strong><h4>price</h4></strong></th>
			<th><strong><h4>payment method</h4></strong></th>
			<th><strong><h4>order status</h4></strong></th>
			
	</tr>
	 </thead>
	 <tbody>
	<?php 	foreach ($user_leave as $order): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($order['OrderType']['name'], array('controller' => 'order_types', 'action' => 'view', $order['OrderType']['id'])); ?>&nbsp;&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link($order['EcurrType']['name'], array('controller' => 'ecurr_types', 'action' => 'view', $order['EcurrType']['id'])); ?>&nbsp;&nbsp;
		</td>
		<td><?php echo h($order['Order']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['price']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id'])); ?>&nbsp;&nbsp;
		</td>
		
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	
	
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
			?>
		</p>
		<div class="pagination">
		<p>
			<ul>
				<li ><?php  echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?> </li>
				<li ><?php  echo $this->Paginator->numbers(array('separator' => ''));?></li>
				<li ><?php  echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
			</ul>
		</p>
		</div>
	</div>
</div>



