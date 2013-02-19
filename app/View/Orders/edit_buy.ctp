

<script>
$(document).ready(function()
{	

	$("#OrderPaymentMethodId").change(function(){
	   
		var total         = 0;
		var percent    = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderPrice').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 0.319;
			$('#OrderDuit').val('MYR');
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
		
	});
		
	$("#OrderPrice").change(function(){
	   	var total         = 0;
		var percent    = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderPrice').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 0.319;
			$('#OrderDuit').val('MYR');
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
		
	});
	 
	$("#OrderEcurrTypeId").change(function(){
		var total         = 0;
		var percent    = 0;
		var payment  = $('#OrderPaymentMethodId').val();
		var price       = $('#OrderPrice').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( payment == 3) {
			total = parseFloat(price) * parseFloat(percent);
			$('#OrderDuit').val('$');
		} else {
			total = (parseFloat(price) * parseFloat(percent))* 0.319;
			$('#OrderDuit').val('MYR');
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
	
	});	
});
</script>


<h2><span>Buy eCurrency</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>	
	<div class="span8 well">
	<?php echo $this->Form->create('Order', array('class' => 'form')); ?>
		<div class="row-fluid">
			<div class="span6">
				<fieldset>
					<legend>I Want To Pay</legend>		
					<?php echo $this->Form->input('user_id', array('type' => 'hidden' ,'value' => $user_id));?>
					    
					<label>Payment  Channel</label>
					<?php echo $this->Form->input('payment_method_id',array('label' => "",'empty'=>'Select' ,'div' => false,));?>
					<label>Amount To  Transfer</label>
					<div class="form-inline">
					<?php 
						echo $this->Form->input('duit', array('label' => "",'div' => false,'class'=>'span2','disabled' => 'disabled',));
						echo '&nbsp';
						echo $this->Form->input('price', array('label' => "",'div' => false,));
					?>
				</div>
					
			</fieldset>
			</div>
			<div class="span6">
				<fieldset>	
					<legend>I Will Get</legend>	
					<label>E-Currency</label>
					<?php echo $this->Form->input('ecurr_type_id',array('label' => "",'div' => false, 'empty'=>'Select'));?>
					<label>E-Currency Account</label>
					<?php  echo $this->Form->input('user_ecurr_id' ,array('label' => "",'div' => false,'empty'=>'Select' ));?>
					<label>Amount i Receive</label>	
					<?php echo $this->Form->input('quantityd', array('label' => "",'div' => false,'disabled' => 'disabled',));?>
					<?php echo $this->Form->input('quantity', array('type' => 'hidden',));?>
				</fieldset>
			</div>
		</div>
		<?php echo $this->Form->Submit(__('Order Now'), array('class'=>'btn btn-primary btn-large btn-block'));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>