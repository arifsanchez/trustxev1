<div class="paymentMethods form">
<?php echo $this->Form->create('PaymentMethod'); ?>
	<fieldset>
		<legend><?php echo __('Edit Payment Method'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PaymentMethod.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PaymentMethod.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Payment Methods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
