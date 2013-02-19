<h2><span>Send SMS</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>	
	<div class="span8 well">
	<?php echo $this->Form->create('Order', array('class' => 'form')); ?>
		<div class="row-fluid">
			<div class="span12">
				<fieldset>
					<legend>Send SMS To User</legend>		
					    
					<label>To</label>
					<?php echo $this->Form->input('sms_number',array('label' => "" ,'div' => false,));?>
					<label>Message</label>
					<div class="form-inline">
						<?php 
							echo $this->Form->input('message', array('type' => 'textarea', 'label' => "",'div' => false));
						?>
					</div>
				</fieldset>
			</div>
		</div>
		<?php echo $this->Form->Submit(__('Send Now'), array('class'=>'btn btn-primary btn-large btn-block'));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>