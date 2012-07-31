<div class="actions">
	<h3><?php echo __('User Cabinet'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('My Profile'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'myprofile'));?></li>
		<li><?php echo $this->Html->link(__('Update Password'), array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'changePassword')); ?> </li>
	</ul>
	
	<h3><?php echo __('Finance Info'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Money In Source'), array('action' => '#'));?></li>
		<li><?php echo $this->Html->link(__('Money Out Source'), array('action' => '#')); ?> </li>
	</ul>
	
	<h3><?php echo __('Exchange'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Purchase History'), array('plugin' => '', 'controller' => 'purchases','action' => 'transaction_history')); ?> </li>
		<li><?php echo $this->Html->link(__('Buy Liberty Reserve'), array('plugin' => '', 'controller' => 'purchases','action' => 'buy_lr'));?></li>
		<li><?php echo $this->Html->link(__('Sell Liberty Reserve'), array('plugin' => '', 'controller' => 'purchases','action' => 'sell_lr')); ?> </li>
		
	</ul>
</div>
