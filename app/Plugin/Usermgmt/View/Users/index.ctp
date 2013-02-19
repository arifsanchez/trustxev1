
<?php echo $this->Html->script(array('/usermgmt/js/um.autocomplete.js?q='.QRDN)); ?>
<h2><span>All User</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
		<?php echo $this->element('dashboard'); ?>
	</div>
	<div class="span9">
		<?php echo $this->element('all_users'); ?>
	</div>
	
	
</div>