
<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "addGroupForm", "submitButtonId" => "addGroupSubmitBtn")); ?>

<h2><span>Add Group</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
	<?php echo $this->element('dashboard'); ?>
	</div>
	<div class="span9 well">
		<div class="um_box_mid_content_mid" id="addgroup">
				<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup', 'id'=>'addGroupForm')); ?>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Group Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
					<div class="umstyle7"><?php echo __('for ex. Business User');?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Alias Group Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
					<div class="umstyle7"><?php echo __('for ex. Business_User (Must not contain space)');?></div>
					<div style="clear:both"></div>
				</div>
				<div class="control-group">
				<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
							$this->request->data['UserGroup']['allowRegistration']=true;
						}   ?>
					<div class="umstyle3"><?php echo __('Allow Registration');?></div>
					<div class="umstyle4"><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?></div>
					
				</div>
				<div class="control-group">
					
					<?php echo $this->Form->Submit(__('Add Group'), array('id'=>'addGroupSubmitBtn','class'=>"btn btn-inverse"));?>
					
				</div>
				<div><?php echo __('Note: If you add a new group then you should give permissions to this newly created Group.');?></div>
				<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
	
