<div class="quotaTallies index">
	<h2><?php echo __('Quota Tallies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bytes_in_used'); ?></th>
			<th><?php echo $this->Paginator->sort('bytes_out_used'); ?></th>
			<th><?php echo $this->Paginator->sort('files_in_used'); ?></th>
			<th><?php echo $this->Paginator->sort('files_out_userd'); ?></th>
			<th><?php echo $this->Paginator->sort('files_xfer_used'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($quotaTallies as $quotaTally): ?>
	<tr>
		<td><?php echo h($quotaTally['QuotaTally']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quotaTally['Account']['account_name'], array('controller' => 'accounts', 'action' => 'view', $quotaTally['Account']['id'])); ?>
		</td>
		<td><?php echo h($quotaTally['QuotaTally']['account_name']); ?>&nbsp;</td>
		<td><?php echo h($quotaTally['QuotaTally']['bytes_in_used']); ?>&nbsp;</td>
		<td><?php echo h($quotaTally['QuotaTally']['bytes_out_used']); ?>&nbsp;</td>
		<td><?php echo h($quotaTally['QuotaTally']['files_in_used']); ?>&nbsp;</td>
		<td><?php echo h($quotaTally['QuotaTally']['files_out_userd']); ?>&nbsp;</td>
		<td><?php echo h($quotaTally['QuotaTally']['files_xfer_used']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quotaTally['QuotaTally']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quotaTally['QuotaTally']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quotaTally['QuotaTally']['id']), null, __('Are you sure you want to delete # %s?', $quotaTally['QuotaTally']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Quota Tally'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
