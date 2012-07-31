<div class="ecurrTypes form">
<?php echo $this->Form->create('EcurrType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ecurr Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EcurrType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EcurrType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ecurr Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Ecurrs'), array('controller' => 'user_ecurrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Ecurr'), array('controller' => 'user_ecurrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
