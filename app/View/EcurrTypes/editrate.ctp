<h2><span>Edit  eCurrency Rate</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
		<div class="span8 well">
			<?php echo $this->Form->create('EcurrType'); ?>
				<fieldset>
					<legend>Edit eCurrency Rate</legend>
						<?php
							echo $this->Form->input('id');
							echo $this->Form->input('name');
							echo $this->Form->input('buy');
							echo $this->Form->input('sell');
						?>
				</fieldset>
				<?php echo $this->Form->end(__('Submit')); ?>
			</div>
	
			
		
	</div>
</div>




