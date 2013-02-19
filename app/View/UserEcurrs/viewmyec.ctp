<div class="userEcurrs view">
<h2><?php  echo __('View My eCurrency'); ?></h2>
	<dl>
		
		
		<dt><?php echo __('eCurrency'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userEcurr['EcurrType']['name'], array('controller' => 'ecurr_types', 'action' => 'view', $userEcurr['EcurrType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acc No'); ?></dt>
		<dd>
			<?php echo h($userEcurr['UserEcurr']['acc_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acc Name'); ?></dt>
		<dd>
			<?php echo h($userEcurr['UserEcurr']['acc_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userEcurr['UserEcurr']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userEcurr['UserEcurr']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php echo $this->element('user_sidebar_panel'); ?>
<?php echo $this->Js->writeBuffer(); ?>