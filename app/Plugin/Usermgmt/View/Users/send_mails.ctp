
<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "sendMailForm", "submitButtonId" => "sendMailSubmitBtn")); ?>
<h2><span>Send Mail</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
	<?php echo $this->element('dashboard'); ?>
	</div>	
	<div id="register" class="span9 well">
			
				<?php echo $this->Form->create('User', array('id'=>'sendMailForm')); ?>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('From Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("from_name" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:500px;max-width:500px' ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('From Email'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("from_email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:500px;max-width:500px' ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('To Email(s)<br/>(comma separated)'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("to_email" ,array('type' => 'textarea', 'label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:500px;max-width:500px;height:50px'))?><div id='toEmailSuggession'></div></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Subject'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("subject" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:500px;max-width:500px' ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Message'));?></div>
					<div class="umstyle4" ><?php  echo $this->Tinymce->textarea('User.message', array('type' => 'textarea', 'label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:508px;max-width:508px;height:200px' ),array('language'=>'en'),'umcode');?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					
					<?php echo $this->Form->Submit(__('Send Mail'), array('id'=>'sendMailSubmitBtn', 'class'=> "btn"));?>
					
				</div>
				<?php echo $this->Form->end(); ?>
			
	</div>
</div>

