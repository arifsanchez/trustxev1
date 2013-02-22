<h2><span>Edit  eCurrency Rate</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
		<div class="span8 well">
			<?php echo $this->Form->create('EcurrType'); ?>
				<fieldset>
					<legend>Edit eCurrency Rate</legend>
						<?php foreach ($user as $user): ?>
						<?php 	echo $this->Form->input('name'); ?>
				</fieldset>
				<?php echo $this->Form->end(__('Submit')); ?>
			</div>
	
			
		
	</div>
</div>




