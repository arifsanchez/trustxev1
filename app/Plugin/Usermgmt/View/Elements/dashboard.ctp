<ul class="nav nav-list">
	<li class="nav-header">Settings</li>
	<li class=""><?php echo $this->Html->link(__("Permissions"), array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index')) ?></li>
	<li class=""><?php echo $this->Html->link(__("All Settings"),array('plugin' => 'usermgmt', 'controller' => 'user_settings', 'action'   => 'index')) ?></li>
	<li class="divider"></li>
	<li class="nav-header">Users &amp; Groups</li>
	<li class=""><?php echo $this->Html->link(__("Add User"),array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser')) ?></li>
	<li class=""><?php echo $this->Html->link(__("All Users"),array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index')) ?></li>
	<li class=""><?php echo $this->Html->link(__("Add Group"),array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup')) ?></li>
	<li class=""><?php echo $this->Html->link(__("All Groups"), array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index')) ?></li>
	<li class=""><?php echo $this->Html->link(__("Online Users"), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'online')) ?></li>
	<li class="divider"></li>
	<li class="nav-header">Utilities</li>
	<li class=""><?php echo $this->Html->link(__("Delete Cache"), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteCache')) ?></li>
	<li class=""><?php echo $this->Html->link(__("Send Mails"), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'sendMails')) ?></li>
	<li class=""><?php echo $this->Html->link(__("All Contact Enquiries"), array('plugin' => 'usermgmt', 'controller' => 'user_contacts', 'action' => 'index')) ?></li>
	<li class=""><?php echo $this->Html->link(__("All Pages"), array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'addPage')) ?></li>
</ul>