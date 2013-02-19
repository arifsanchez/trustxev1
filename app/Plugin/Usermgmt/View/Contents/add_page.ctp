
<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation.js?q='.QRDN)); ?>
<?php echo $this->element('ajax_validation', array("formId" => "addPageForm", "submitButtonId" => "addPageSubmitBtn")); ?>
<h2><span>All Pages</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
	<?php echo $this->element('dashboard'); ?>
	</div>
			
	<div class="span9 well" id="pageContent">
		<?php echo $this->Form->create('Content', array('id'=>'addPageForm')); ?>
		<div class="control-group">
			<div class="umstyle3 required"><?php echo $this->Form->label(__('Page Name'));?></div>
			<div class="umstyle4" ><?php echo $this->Form->input("page_name", array('type' => 'text', 'label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:40%;'))?></div>
			<div class='extext'><?php echo __('For ex. Contact Us, About Us'); ?></div>
		<div style="clear:both"></div>
		</div>
		<div class="control-group">
			<div class="umstyle3 required"><?php echo $this->Form->label(__('Url Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("url_name", array('type' => 'text', 'label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:40%;'))?></div>
				<div class='extext'><?php echo __('For ex. contactus, contactus.html, aboutus, aboutus.html'); ?></div>
				<div style="clear:both"></div>
		</div>
		<div class="control-group">
			<div class="umstyle3"><?php echo $this->Form->label(__('Page Title'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("page_title", array('type' => 'text','label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:40%;'))?></div>
					<div class='extext'><?php echo __('For ex. Your Contact Details'); ?></div>
				<div style="clear:both"></div>
		</div>
		<div class="control-group">
			<div class="umstyle3 required"><?php echo $this->Form->label(__('Page Content'));?></div>
					<div class="umstyle4" ><?php  echo $this->Tinymce->textarea('Content.page_content', array('type' => 'textarea', 'label' => false,'div' => false,'class'=>"umstyle5", 'style'=>'width:70%;max-width:80%;height:400px' ),array('language'=>'en'),'umcode');?></div>
			<div style="clear:both"></div>
		</div>
		<div class="control-group">
				<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Page'), array('id'=>'addPageSubmitBtn','class'=>"btn"));?></div>
						<div style="clear:both"></div>
		</div>
						<?php echo $this->Form->end(); ?>
	</div>
</div>
