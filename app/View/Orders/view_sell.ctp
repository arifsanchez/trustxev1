
<h2><span>Sell eCurrency # TXE</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
		<div class="span8 well">
			
				<fieldset>
					<legend>Sell eCurrency Details</legend>
						<div class="span8 offset2 ">
						<dl class="dl-horizontal" >
							<dt>Amount  To Sell</dt>
								<dd>
									<?php echo h($order['Order']['quantity']); ?>
									&nbsp;
								</dd><p>
							<dt>eCurrency</dt>
								<dd>
									<?php echo $this->Html->link($order['EcurrType']['name'], array('controller' => 'ecurr_types', 'action' => 'view', $order['EcurrType']['id'])); ?>
									&nbsp;
								</dd><p>
							<dt>eCurrency Account</dt>
								<dd>
									<?php echo $this->Html->link($order['UserEcurr']['acc_no'], array('controller' => 'user_ecurrs', 'action' => 'view', $order['UserEcurr']['id'])); ?>
									&nbsp;
								</dd><p>
							<dt>Amount  To Receive</dt>
								<dd>
									<?php echo h($order['Order']['price']); ?>
									&nbsp;
								</dd><p>
							<dt>Payment Channel</dt>
								<dd>
									<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
									&nbsp;
								</dd><p>
							<dt>Account Name</dt>
								<dd>
									<?php echo h($order['Order']['acc_name']); ?>
									&nbsp;
								</dd><p>	
							<dt>Account Number</dt>
								<dd>
									<?php echo h($order['Order']['acc_no']); ?>
									&nbsp;
								</dd><p>
							<dt>Order Status</dt>
								<dd>
									<?php echo $this->Html->link($order['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $order['OrderStatus']['id'])); ?>
									&nbsp;
								</dd><p>
						</dl>
						</div>
				</fieldset>
				
				
					<?php echo $this->Form->create('Order', array('class' => 'form' )); ?>
						<label>Bank Name<label>
							<?php echo $this->Form->input('bank_name',array('label' => "",'div' => false, ));?>
						<label>Account Name</label>
							<?php echo $this->Form->input('acc_name',array('label' => "", ));?>
						<label>Account Number</label>
							<?php echo $this->Form->input('acc_no',array('label' => "", ));?>
						
							<?php echo $this->Form->input('lrmount', array('type' => 'hidden', 'value' => $order['Order']['quantity']));
							echo $this->Form->input('type', array('type' => 'hidden', 'value' => $order['EcurrType']['id']));?>
							<div>
						<div class="span4 offset2"><?php echo $this->Form->submit('Back', array('name' => 'submit2','class'=>'btn btn-primary '));	?> </div>
						<?php echo $this->Form->submit('Next', array('name' => 'submit1','class'=>'btn btn-primary ',)); ?>
						<div>
					<?php echo $this->Form->end(); ?>
				?>
			</div>
	
			
	
		
	</div>
</div>
