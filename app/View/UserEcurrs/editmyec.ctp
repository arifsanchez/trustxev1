<div class="userEcurrs form">
<?php echo $this->Form->create('UserEcurr'); ?>
	<fieldset>
		<legend><?php echo __('Edit My eCurrency'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('type' => 'hidden' ,'value' => $user_id));
		echo $this->Form->input('ecurr_type_id');
		echo $this->Form->input('acc_no');
		echo $this->Form->input('acc_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('user_sidebar_panel'); ?>
<?php echo $this->Js->writeBuffer(); ?>
