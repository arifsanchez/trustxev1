<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "addUserForm", "submitButtonId" => "addUserSubmitBtn")); ?>

<h2><span>Add User</span></h2>

<div class="row-fluid">    

	<div class="span3 alert">
		<?php echo $this->element('dashboard'); ?>
	</div>
	<div class="span9 well">
		<?php echo $this->Form->create('User', array('action' => 'addUser', 'id'=>'addUserForm' , 'class' => 'form-horizontal form-flexible')); ?>
		 
		<fieldset>
		
		<div class="control-group">
		<label>Passport / Identity Card No</label>
		<?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'multiple' => true,'label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>Username</label>
		<?php echo $this->Form->input("username" ,array('label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>First Name</label>
		<?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>Last Name</label>
		<?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>Email</label>
		<?php echo $this->Form->input("email" ,array('label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>Password</label>
		<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">
		<label>Confirm Password</label>
		<?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false ))?>
		</div>
		
		<div class="control-group">	
				<?php echo $this->Form->Submit(__('Add User'), array('id'=>'addUserSubmitBtn', 'class' => 'btn'));?>
		</div>
		<?php echo $this->Form->end(); ?>
	    </fieldset>
	</div>
</div>