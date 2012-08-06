<div class="actions">
	<h3><?php echo __('User Cabinet'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('My Profile'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'myprofile'));?></li>
		<li><?php echo $this->Html->link(__('Update Password'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'changePassword')); ?></li>
		<li><?php echo $this->Html->link(__('My eCurrency'), array('action' => '#'));?></li>
		<li><?php echo $this->Html->link(__('My Bank Profile'), array('action' => '#'));?></li>
	</ul>
	
	<h3><?php echo __('Exchange'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Order History'), array('plugin' => '', 'controller' => 'orders','action' => 'transaction_history')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('plugin' => '', 'controller' => 'orders','action' => 'new_order'));?></li>
		
	</ul>
</div>
