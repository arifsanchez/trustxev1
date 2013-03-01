
<h2><span>Buy eCurrency # TXE</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>

		<div class="span8 well">
			
				<fieldset>
					<legend>Buy eCurrency Details</legend>
						<div class="span8 offset2 ">
						<dl class="dl-horizontal" >
							
							<dt>Amount  To Get</dt>
								<dd>
									<?php echo h($order['Order']['quantity']); ?>
									&nbsp;
								</dd><p>
							<dt>eCurrency</dt>
								<dd>
									<?php echo $order['EcurrType']['name']; ?>
									&nbsp;
								</dd><p>
							<dt>eCurrency Account</dt>
								<dd>
									<?php echo $order['UserEcurr']['acc_no']; ?>
									&nbsp;
								</dd><p>
							<dt>Amount  To Transfer</dt>
								<dd>
									<?php echo h($order['Order']['price']); ?>
									&nbsp;
								</dd><p>
							
							<dt>Payment  To</dt>
								<dd>
									<?php echo $order['PaymentMethod']['name']; ?>
									&nbsp;
								</dd><p>
							
							
						<dt>Order Status</dt>
								<dd>
									<?php echo $order['OrderStatus']['name']; ?>
									&nbsp;
								</dd><p>
						</dl>
						</div>
				</fieldset>
				<?php  echo $this->Form->create('Order', array('class' => 'form' )); ?>	
					<div class="span4 offset2"> <?php echo $this->Form->submit('Back', array('name' => 'submit2','class'=>'btn btn-primary ')); ?></div>
					<?php echo $this->Form->submit('Next', array('name' => 'submit1','class'=>'btn btn-primary ',));  
					echo $this->Form->end(); 
				?>
					
										
		
		</div>
</div>
