<script>
$(document).ready(function()
{	
	$("#OrderQuantity").change(function(){
		/*window.alert( 'Order Quantity' + $('#OrderQuantity').val() );*/
		var total = 0;
		var quantity = $('#OrderQuantity').val();
		var price_lock = parseFloat(quantity) * 0.02;
		total = parseFloat(quantity) + parseFloat(price_lock);
		$('#OrderPrice').val(total);
		$('#OrderPricedisplay').val(total);
	});
});
</script>
<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('order_type_id');
		echo $this->Form->input('user_id', array('type' => 'hidden' ,'value' => $user_id));
		echo $this->Form->input('product_id');
		echo $this->Form->input('quantity', array());
		echo $this->Form->input('user_ecurr_id');
		echo $this->Form->input('pricedisplay', array('label' => 'You Need to Pay (2% Service Charge)','disabled' => 'disabled','class' => 'price_lock','type'=>'text'));
		echo $this->Form->input('price', array('type' => 'hidden','class' => 'price_lock'));
		echo $this->Form->input('payment_method_id');
		echo $this->Form->input('order_status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Order Types'), array('controller' => 'order_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Type'), array('controller' => 'order_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ecurrs'), array('controller' => 'user_ecurrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Ecurr'), array('controller' => 'user_ecurrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Methods'), array('controller' => 'payment_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Method'), array('controller' => 'payment_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>


<?php echo $this->Js->writeBuffer(); ?>