<div class="userEcurrs index">
	<h2><?php echo __('User Ecurrs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ecurr_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('acc_no'); ?></th>
			<th><?php echo $this->Paginator->sort('acc_name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($userEcurrs as $userEcurr): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($userEcurr['EcurrType']['name'], array('controller' => 'ecurr_types', 'action' => 'view', $userEcurr['EcurrType']['id'])); ?>
		</td>
		<td><?php echo h($userEcurr['UserEcurr']['acc_no']); ?>&nbsp;</td>
		<td><?php echo h($userEcurr['UserEcurr']['acc_name']); ?>&nbsp;</td>
		<td><?php echo h($userEcurr['UserEcurr']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userEcurr['UserEcurr']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userEcurr['UserEcurr']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userEcurr['UserEcurr']['id']), null, __('Are you sure you want to delete # %s?', $userEcurr['UserEcurr']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		$this->Paginator->options(array(
		    'update' => '#content',
		    'evalScripts' => true,
		    'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
		    'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
		));
	?>
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Html->image('loading-indicator.gif', array('id' => 'busy-indicator'));
	?>
	</div>
</div>
<?php echo $this->element('user_sidebar_panel'); ?>
<?php echo $this->Js->writeBuffer(); ?>