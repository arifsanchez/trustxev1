<div class="actions">
	<h3><?php echo __('User Cabinet'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cabinet'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'dashboard'));?></li>
		<li><?php echo $this->Html->link(__('My Profile'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'myprofile'));?></li>
		<li><?php echo $this->Html->link(__('Update Password'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'changePassword')); ?></li>
		<li><?php echo $this->Html->link(__('My eCurrency'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'myecurr')); ?> </li>
		<li><?php echo $this->Html->link(__('Add  eCurrency'), array('plugin' => '', 'controller' => 'user_ecurrs','action' => 'addmyec')); ?> </li>
	</ul>
	
	<h3><?php echo __('Exchange'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Buy'), array('plugin' => '', 'controller' => 'orders','action' => 'malaysia')); ?> </li>
		<li><?php echo $this->Html->link(__('Sell'), array('plugin' => '', 'controller' => 'orders','action' => 'sell')); ?> </li>
		<li><?php echo $this->Html->link(__('Order History'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'history'));?></li>
		
	</ul>
</div>
