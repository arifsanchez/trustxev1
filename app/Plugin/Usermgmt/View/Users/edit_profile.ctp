<style>
.boxwhite {
	-moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #EEEEEE #DDDDDD #DDDDDD;
    border-image: none;
    border-radius: 3px 3px 3px 3px;
    border-right: 1px solid #DDDDDD;
    border-style: solid;
    border-width: 1px;
    padding: 15px;
    position: relative;
    width: 380px;
	}
</style>

<?php #echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php #echo $this->element('ajax_validation', array("formId" => "editProfileForm", "submitButtonId" => "editProfileSubmitBtn")); ?>

<h2><span>Update Profile</span></h2>

<div class="row-fluid">
	<div class="span4 well">
		<?php echo $this->element('rates'); ?>
	</div>	
	
	
	<div class="span8 boxwhite">
		
		<?php echo $this->Form->create('User', array('type' => 'file', 'id'=>'editProfileForm' , 'class' => 'form')); ?>
		<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
		<?php echo $this->Form->input("UserDetail.id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
		<?php $changeUserName = (ALLOW_CHANGE_USERNAME) ? false : true; ?>
		
		<fieldset>
			<legend>Account Details</legend>
			<div class="input-prepend">
				<label>Username</label>
				<span class="add-on"><i class="icon-lock"></i></span>
				<?php echo $this->Form->input("username" ,array('label' => false,'div' => false, 'readonly'=>$changeUserName))?>
			</div>
			
			<div class="input-prepend">
				<label>Email</label>
				<span class="add-on">@</span>
				<?php echo $this->Form->input("email" ,array('label' => false,'div' => false))?>
				<p><?php echo __('If you change it, we will verify the new email address.');?></p>
			</div>
		</fieldset>
		
		<fieldset>
			<legend>Profile Details</legend>
			<label>Name</label>
			<div class="form-inline">
				<?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false ))?>
				<?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false ))?>
			</div>
			
			<label> Location</label>
			<?php echo $this->Form->input("UserDetail.location" ,array('label' => false,'div' => false))?>
			
			<label>Profile Photo</label>
			<!--[if gte IE 9]>
			<style>
				.ie_show { display:block }
				.ie_hide { display:none }
			</style>
			<![endif]-->
			<div class="input-append ie_hide">
				<input type="file" name="data[UserDetail][photo]" id="UserDetailPhoto" class="hide ie_show" />
				<input id="pretty-input" class="input-xlarge" type="text" onclick="$('input[id=UserDetailPhoto]').click();">
				<a class="btn" onclick="$('input[id=UserDetailPhoto]').click();">Browse</a>
			</div>
			<script type="text/javascript">
				$('input[id=UserDetailPhoto]').change(function() {
					$('#pretty-input').val($(this).val().replace("C:\\fakepath\\", ""));
				});
			</script>
		</fieldset>
		
		<?php echo $this->Form->Submit(__('Update Profile'), array('id'=>'editProfileSubmitBtn', 'class'=>'btn btn-primary pull-right'));?>
		<?php echo $this->Form->end(); ?>
		
	</div>
</div>

	
