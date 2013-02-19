
<?php echo $this->Html->script(array('/usermgmt/js/um.autocomplete.js?q='.QRDN)); ?>
<h2><span>User Online</span></h2>
<div class="row-fluid">
	<div class="span3 alert">
	<?php echo $this->element('dashboard'); ?>
	</div>
	<div class="span9" id="index">
			<div id="updateOnlineIndex">
				<?php echo $this->element('online_users'); ?>
			</div>
	</div>
</div>
