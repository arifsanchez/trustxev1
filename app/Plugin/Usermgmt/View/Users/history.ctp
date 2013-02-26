
<h2><span>Transaction History</span></h2>

<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
	
	<div class="span8 well">
	<table  class="table table-striped">
	 <caption></caption>
	  <thead>
	<tr>
			<th><strong><h4>order</h4></strong></th>
			<th><strong><h4>product</h4></strong></th>
			<th><strong><h4>quantity</h4></strong></th>
			<th><strong><h4>price</h4></strong></th>
			<th><strong><h4> my payment method</h4></strong></th>
			<th><strong><h4>order status</h4></strong></th>
			
	</tr>
	 </thead>
	 <tbody>
	<?php 	foreach ($history as $order): ?>
	<tr>
		<td>
			<center><?php echo $order['OrderType']['name']; ?></center>&nbsp;&nbsp;
		</td>
		<td>
			<center><?php echo $order['EcurrType']['name']; ?></center>&nbsp;&nbsp;
		</td>
		<td><center><?php echo h($order['Order']['quantity']); ?></center></td>
		<td><center><?php echo h($order['Order']['price']); ?></center>&nbsp;</td>
		<td>
			<center><?php echo $order['Bank']['name']; ?></center>
		</td>
		<td>
			<center><?php echo $order['OrderStatus']['name']; ?></center>&nbsp;&nbsp;
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



