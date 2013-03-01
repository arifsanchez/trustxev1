
<h2><span>Buy eCurrency # TXE</span></h2>
<div class="row-fluid">
	<div class="span4 alert">
		<?php echo $this->element('rates'); ?>
	</div>
		<div class="span8 well">
			
				<fieldset>
					<legend>Buy eCurrency </legend>
						<?php foreach ($user as $user): ?>
						<p>Dear <?php echo $user['User']['username']?>, <p>
						<p>
						<p> Thank you for using our service. All you payment details have been send to  this "<?php echo $user['User']['email'] ?>"  email address. You will received the Liberty Reserve credit within 3 days of the payment. Thank you for your co-operation.</p>
				</fieldset>
				
			</div><?php endforeach; ?>
	
			
		
	</div>
</div>
