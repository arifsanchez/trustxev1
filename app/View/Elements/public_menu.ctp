<?php   if ($this->UserAuth->getGroupName()=='Admin') { ?>
	<div id="dashboard">
	<div style="float:left"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("My Profile",true),"/viewUser/".$this->UserAuth->getUserId()) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Edit Profile",true),"/editUser/".$this->UserAuth->getUserId()) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Users",true),"/allUsers") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Groups",true),"/allGroups") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Security",true),"/permissions") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("LR Accounts",true),"/lr_accounts") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Buy History",true),"/purchases") ?></div>
	<div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Sign Out",true),"/logout") ?></div>
    <div style="clear:both"></div>
	</div>
<?php } elseif ($this->UserAuth->getGroupName()==''){ ?>
	<div id="dashboard">
		<div style="float:left"><?php echo $this->Html->link(__("Home",true),"/pages/home") ?></div>
		<div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Login",true),"/login") ?></div>
		<div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Register",true),"/register") ?></div>
    	<div style="clear:both"></div>
	</div>
<?php } ?>
<!--
<?php   #} else {?>
	<div style="float:left;padding-left:10px"><?php #echo $this->Html->link(__("Profile",true),"/myprofile") ?></div>
<?php   #} ?>
	<div style="float:left;padding-left:10px"><?php #echo $this->Html->link(__("Change Password",true),"/changePassword") ?></div>
	<div style="float:right;padding-left:10px"><?php #echo $this->Html->link(__("Sign Out",true),"/logout") ?></div>
	<div style="clear:both"></div>
</div>
-->