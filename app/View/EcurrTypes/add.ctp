<div class="ecurrTypes form">
<?php echo $this->Form->create('EcurrType'); ?>
	<fieldset>
		<legend><?php echo __('Add Ecurr Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ecurr Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Ecurrs'), array('controller' => 'user_ecurrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Ecurr'), array('controller' => 'user_ecurrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
