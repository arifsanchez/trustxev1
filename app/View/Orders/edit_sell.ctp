
<script>
$(document).ready(function()
{	
	$("#OrderPaymentMethodId").change(function(){
	   	var total         = 0;
		var  percent   = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderQuantity').val();
		var rate         = $('#OrderEcurrTypeId').val();
					
		if (rate==1){ percent  = 0.9 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
		
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
			
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 3.3;
			$('#OrderDuit').val('MYR');
		}
		
		$('#OrderPriced').val(total);
		$('#OrderPrice').val(total);
				
	});
	
	$("#OrderQuantity").change(function(){
	   	var total         = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderQuantity').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.9 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
		
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
			
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 3.3;
			$('#OrderDuit').val('MYR');
		}
		
		$('#OrderPriced').val('123');
		$('#OrderPrice').val(total);
		
	});
	 
	$("#OrderEcurrTypeId").change(function(){
		var total         = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderQuantity').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.9 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
		
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
			
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 3.3;
			$('#OrderDuit').val('MYR');
		}
		
		$('#OrderPriced').val(total);
		$('#OrderPrice').val(total);
	
	});	
});
</script>

<h2><span>Sell eCurrency</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>	
	<div class="span8 well">
	<?php echo $this->Form->create('Order', array('class' => 'form')); ?>
		<div class="row-fluid">
			<div class="span6">
				<fieldset>
					<legend>I Want To Sell</legend>		
					<?php echo $this->Form->input('user_id', array('type' => 'hidden' ));?>
					<label>E-Currency</label>
					<?php echo $this->Form->input('ecurr_type_id',array('label' => "",'empty'=>'Select', 'div' => false, ));?>
					<label>E-Currency Account</label>
					<?php  echo $this->Form->input('user_ecurr_id' ,array('label' => "",'empty'=>'Select', 'div' => false, ));?>
					<label>Amount To  Transfer</label>
					<?php echo $this->Form->input('quantity', array('label' => "",'div' => false,));?>
				</fieldset>
			</div>
			<div class="span6">
				<fieldset>	
					<legend>I Will Get</legend>	
					<label>Payment  Channel</label>
					<?php echo $this->Form->input('payment_method_id',array('label' => "",'empty'=>'Select' ,'div' => false, ));?>
					<label>Account Number</label>
					<?php echo $this->Form->input('acc_no',array('label' => "",'div' => false, ));?>
					<label>Amount i Receive</label>	
					<div class="form-inline">
					<?php 
						echo $this->Form->input('duit', array('label' => "",'div' => false,'class'=>'span2','disabled' => 'disabled',));
						echo '&nbsp';
						echo $this->Form->input('price', array('label' => "",'div' => false,'disabled' => 'disabled',));
					?>
				</div>
					<?php echo $this->Form->input('price', array('type' => '',));?>
				</fieldset>
			</div>
		</div>
		<?php echo $this->Form->Submit(__('Save'), array('class'=>'btn btn-primary btn-large btn-block'));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>