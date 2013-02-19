<div class="userEcurrs form">
<?php echo $this->Form->create('UserEcurr'); ?>
<fieldset>
		<legend>Add  My eCurrency</legend>
		
<table cellspacing="0" cellpadding="0" width="100%" border="0" >
	
		
		
		<?php echo $this->Form->input('user_id', array('type' => 'hidden' ,'value' => $user_id));?>
		<tr>
			<td>eCurrency  Account </td>
			<td><?php echo $this->Form->input('ecurr_type_id',array('label' => "",'div' => false, ));?></td>
		</tr>
		<tr>
			<td>Account No# </td>
			<td><?php echo $this->Form->input('acc_no',array('label' => "",'div' => false, ));?></td>
		</tr>
		<tr>
			<td>Account  Name</td>
			<td><?php echo $this->Form->input('acc_name',array('label' => "",'div' => false, ));?></td>
		
	
	</fieldset>
<tr><td><?php echo $this->Form->end(__('Submit')); ?></td></tr>
</table>
</fieldset>
</div>
<?php echo $this->element('user_sidebar_panel'); ?>
<?php echo $this->Js->writeBuffer(); ?>
