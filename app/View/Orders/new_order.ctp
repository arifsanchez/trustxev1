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
<?php echo $this->element('user_sidebar_panel'); ?>

<?php echo $this->Js->writeBuffer(); ?>