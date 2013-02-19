<h2><span>All Setting</span></h2>
<?php echo $this->Html->script(array('/usermgmt/js/um.autocomplete.js?q='.QRDN)); ?>
<div class="row-fluid">
	<div class="span3 alert">
		<?php echo $this->element('dashboard'); ?>
	</div>
	<div class="span9">		
		<?php echo $this->element('all_settings'); ?>
	</div>	
</div>