<h2><span>Email Verification</span></h2>
<div class="row-fluid">

	<div class="span3 alert">
		<?php echo $this->element('rates'); ?>
	</div>
				
	<div class="span9 well">		
			<?php echo $this->Form->create('User', array('action' => 'emailVerification','id'=>'forgot','class' => 'form-inline')); ?>
				
				
				<?php echo __('Enter Email / Username');?>
					<?php echo $this->Form->input("email" ,array('label' => false,'div' => false))?>
				
				
				
				<?php echo $this->Form->Submit(__('Send Email'),array('class' => 'btn'));?>
			 
			
			
					
				<?php echo $this->Form->end(); ?>
			  
				
	</div>
	
</div>   