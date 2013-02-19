
<h2><span>Order # TXE</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>

<div class="span8 well">

	<dl class="dl-horizontal" >
		
		<dt>Amount  To Transfer</dt>
		<dd>
			<?php echo h($order['Order']['price']); ?>
			&nbsp;
		</dd>
		 
		<dt>Payment Channel</dt>
		<dd>
			<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
			&nbsp;
		</dd>
		 
		<dt>eCurrency</dt>
		<dd>
			<?php echo $this->Html->link($order['EcurrType']['name'], array('controller' => 'ecurr_types', 'action' => 'view', $order['EcurrType']['id'])); ?>
			&nbsp;
		
		</dd>
		
		<dt>eCurrency Account</dt>
		<dd>
			<?php echo $this->Html->link($order['UserEcurr']['acc_no'], array('controller' => 'user_ecurrs', 'action' => 'view', $order['UserEcurr']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt>Amount  To Get</dt>
		<dd>
			<?php echo h($order['Order']['quantity']); ?>
			&nbsp;
		</dd>
		
		
		<dt>Order Status</dt>
		<dd>
			<?php echo $this->Html->link($order['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
	<h4><span>Payment Instrustion</span></h4>
</div>
</div>
