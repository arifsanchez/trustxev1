<div class="ecurrTypes view">
<h2><?php  echo __('Ecurr Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ecurrType['EcurrType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ecurrType['EcurrType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ecurr Type'), array('action' => 'edit', $ecurrType['EcurrType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ecurr Type'), array('action' => 'delete', $ecurrType['EcurrType']['id']), null, __('Are you sure you want to delete # %s?', $ecurrType['EcurrType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ecurr Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ecurr Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ecurrs'), array('controller' => 'user_ecurrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Ecurr'), array('controller' => 'user_ecurrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Ecurrs'); ?></h3>
	<?php if (!empty($ecurrType['UserEcurr'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Ecurr Type Id'); ?></th>
		<th><?php echo __('Acc No'); ?></th>
		<th><?php echo __('Acc Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ecurrType['UserEcurr'] as $userEcurr): ?>
		<tr>
			<td><?php echo $userEcurr['id']; ?></td>
			<td><?php echo $userEcurr['user_id']; ?></td>
			<td><?php echo $userEcurr['ecurr_type_id']; ?></td>
			<td><?php echo $userEcurr['acc_no']; ?></td>
			<td><?php echo $userEcurr['acc_name']; ?></td>
			<td><?php echo $userEcurr['created']; ?></td>
			<td><?php echo $userEcurr['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_ecurrs', 'action' => 'view', $userEcurr['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_ecurrs', 'action' => 'edit', $userEcurr['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_ecurrs', 'action' => 'delete', $userEcurr['id']), null, __('Are you sure you want to delete # %s?', $userEcurr['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Ecurr'), array('controller' => 'user_ecurrs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
