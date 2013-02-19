<div class="userEcurrs form">
<?php echo $this->Form->create('UserEcurr'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Ecurr'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('ecurr_type_id');
		echo $this->Form->input('acc_no');
		echo $this->Form->input('acc_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserEcurr.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserEcurr.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Ecurrs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ecurr Types'), array('controller' => 'ecurr_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ecurr Type'), array('controller' => 'ecurr_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
