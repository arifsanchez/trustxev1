
<?php echo $this->Html->script(array('/usermgmt/js/um.autocomplete.js?q='.QRDN)); ?>
<h2><span>All Contacts</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
	<?php echo $this->element('dashboard'); ?>
	</div>	
	<div class="span9">
		<div id="updateContactIndex">
			<?php echo $this->element('all_contacts'); ?>
		</div>
	</div>
</div>