

<script>
$(document).ready(function()
{	
	
	$("#OrderBankId").change(function(){
	   
		var total         = 0;
		var percent    = 0;
		var to			= $('#OrderPaymentMethodId').val();
		var from		= $('#OrderBankId').val();
		var priced      = $('#OrderPriced').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( to== 3) {
			$('#OrderDuitd').val('$');
			$('#OrderDuit').val('$');
			if( from==3){
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 5;
				$('#OrderPrices').val(plus);
				$('#OrderPrice').val(plus);
			}else{
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 55;
				$('#OrderPrice').val(plus);
				$('#OrderPrices').val(plus);
			}
		} else {
			total = parseFloat(priced) *0.319;
			$('#OrderDuit').val('MYR');
			$('#OrderPrices').val(priced);
			$('#OrderDuitd').val('MYR');
			$('#OrderPrice').val(priced);
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
		
	});
	$("#OrderPaymentMethodId").change(function(){
	   
		var total         = 0;
		var percent    = 0;
		var to			= $('#OrderPaymentMethodId').val();
		var from		= $('#OrderBankId').val();
		var priced      = $('#OrderPriced').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( to== 3) {
			$('#OrderDuitd').val('$');
			$('#OrderDuit').val('$');
			if( from==3){
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 5;
				$('#OrderPrices').val(plus);
				$('#OrderPrice').val(plus);
			}else{
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 55;
				$('#OrderPrice').val(plus);
				$('#OrderPrices').val(plus);
			}
		} else {
			total = parseFloat(priced) * 0.319;
			$('#OrderDuit').val('MYR');
			$('#OrderPrices').val(priced);
			$('#OrderDuitd').val('MYR');
			$('#OrderPrice').val(priced);
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
		
	});
		
	$("#OrderPriced").change(function(){
	   var total         = 0;
		var percent    = 0;
		var to			= $('#OrderPaymentMethodId').val();
		var from		= $('#OrderBankId').val();
		var priced      = $('#OrderPriced').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( to== 3) {
			$('#OrderDuitd').val('$');
			$('#OrderDuit').val('$');
			if( from==3){
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 5;
				$('#OrderPrices').val(plus);
				$('#OrderPrice').val(plus);
			}else{
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 55;
				$('#OrderPrice').val(plus);
				$('#OrderPrices').val(plus);
			}
		} else {
			total = parseFloat(priced)* 0.319;
			$('#OrderDuit').val('MYR');
			$('#OrderPrices').val(priced);
			$('#OrderDuitd').val('MYR');
			$('#OrderPrice').val(priced);
		}
		$('#OrderQuantityd').val(total);
		$('#OrderQuantity').val(total); 
	});
	 
	$("#OrderEcurrTypeId").change(function(){
		var total         = 0;
		var percent    = 0;
		var to			= $('#OrderPaymentMethodId').val();
		var from		= $('#OrderBankId').val();
		var priced      = $('#OrderPriced').val();
		var rate         = $('#OrderEcurrTypeId').val();
		
		if (rate==1){ percent  = 0.98 }
		if (rate==2) { percent =0.89}
		if (rate==3) {percent =3.4}
		if(rate==4) {percent =10650}
				 	
		if ( to == 3) {
			if( from==3){
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 5;
				$('#OrderDuitd').val('$');
				$('#OrderDuit').val('$');
				$('#OrderPrices').val(plus);
				$('#OrderPrice').val(plus);
			
			}else{
				total = parseFloat(priced) * parseFloat(percent);
				plus =  parseFloat(priced) + 55;
				$('#OrderPrice').val(plus);
				$('#OrderPrices').val(plus);
				$('#OrderDuitd').val('$');
				$('#OrderDuit').val('$');
			}
		} else {
			total = parseFloat(priced) *0.319;
			$('#OrderDuit').val('MYR');
			$('#OrderPrices').val('');
			$('#OrderDuitd').val('');
			$('#OrderPrice').val(priced);
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
				<fieldset>
					<legend>Buy eCurrency</legend>		
					<?php echo $this->Form->input('user_id', array('type' => 'hidden' ,'value' => $user_id));?>
					
					<div class="form-inline">
						<label>You Need</label>
						<?php echo $this->Form->input('quantity', array('label' => "",'div' => false,));?>
						<?php echo $this->Form->input('ecurr_type_id',array('label' => "",'div' => false, 'empty'=>'Select'));?>
					</div>
					<div class="form-inline">
						<label>Payment  Channel</label>
						<?php echo $this->Form->input('bank_id',array('label' => "",'empty'=>'Select' ,'div' => false,)); ?>
					</div>
					<div class="form-inline">
						<label>The commision is </label>
						<?php echo $this->Form->input('commision', array('label' => "",'div' => false,));?>
					</div>
					<div class="form-inline">
						<label>You Must Pay </label>
						<?php echo $this->Form->input('price', array('label' => "",'div' => false,));?>
					</div>
					<div class="form-inline">
						<label>Your E-currency account </label>
						<?php echo $this->Form->input('ecurrency_acc', array('label' => "",'div' => false,));?>
					</div>
			</fieldset>
		</div>
			
		</div>
		<?php echo $this->Form->Submit(__('Order Now'), array('class'=>'btn btn-primary btn-large btn-block'));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>