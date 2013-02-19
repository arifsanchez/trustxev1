<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "registerForm", "submitButtonId" => "registerSubmitBtn")); ?>


<h2><span>Start using our services</span></h2>
                
	<div class="row-fluid">
		<div class="span12  alert">
		<div class="row-fluid">    
		<div class="span3 ">
			<?php echo $this->Form->create('User', array('action' => 'register', 'accept-charset'=>'utf-8','id'=>'registerForm' , 'class' => 'form-horizontal form-flexible')); ?>
			
			<fieldset>
				
				<legend><span class="badge badge-success">1</span>&nbsp;Account Details</legend>
				<div class="control-group">
				<label> Full Name </label>
				<div class="form-inline">
					<?php 
						echo $this->Form->input("first_name" ,array('label' => false,'div' => false, 'class' => 'input-small', 'placeholder' => 'First Name'));
						echo '&nbsp';
						echo $this->Form->input("last_name" ,array('label' => false,'div' => false, 'class' => 'input-small','placeholder' => 'Last Name'));
					?>
				</div>
				</div>
				
				<div class="control-group">
				<label>Passport / Identity Card No</label>
				<?php echo $this->Form->input("UserDetail.passport" ,array('label' => false,'div' => false, 'placeholder' => 'e.g : A2886888X'))?>
				</div>
				
				<div class="control-group">
				<label>Mobile Phone</label>
				<?php echo $this->Form->input("UserDetail.cellphone" ,array('label' => false,'div' => false,'placeholder' => 'e.g : 4412345678' ))?>
				</div>
				
				<div class="control-group">
				<label>Email</label>
				<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'placeholder' => 'john@gmail.com' ))?>
				</div>
			</fieldset>
		</div>
        
		<div class="span3">
			<fieldset>
				<legend><span class="badge badge-success">2</span>&nbsp;Access Details</legend>

				<div class="control-group">
				<?php echo $this->Form->label(__('Username'));?>
				<?php echo $this->Form->input("username" ,array('label' => false,'div' => false, ))?>
				</div>
				
				<div class="control-group">
				<?php echo $this->Form->label(__('Password'));?>
				<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false))?>
				</div>
				
				<div class="control-group">
				<?php echo $this->Form->label(__('Confirm Password'));?>
				<?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false))?>
				</div>

			</fieldset>
		</div><!--/span3-->

		<div class="span6  alert alert-info">
			<legend>Ready To Sign Up</legend>
			<p>To complete the registration you have to fill all the fields with valid information.</p>
			<p>We strongly recommend you to read our Terms and Conditions to avoid any problems using Trust XE</p>
			<p>By pressing the button you agree to our Terms &amp; Conditions.</p>
			<?php echo $this->Form->Submit(__('Create New Account'), array('id'=>'registerSubmitBtn', 'class' => 'btn btn-large btn-primary btn-block'));?>
			<?php echo $this->Form->end(); ?>
		</div>
		</div>
		</div>
	</div><!--/row-fluid-->
    
<!--/container-->