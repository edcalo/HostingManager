<div class="quotaLimits index">
	<h2><?php echo __('Quota Limits'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_name'); ?></th>
			<th><?php echo $this->Paginator->sort('quota_type'); ?></th>
			<th><?php echo $this->Paginator->sort('per_session'); ?></th>
			<th><?php echo $this->Paginator->sort('limit_type'); ?></th>
			<th><?php echo $this->Paginator->sort('bytes_in_avail'); ?></th>
			<th><?php echo $this->Paginator->sort('bytes_out_avail'); ?></th>
			<th><?php echo $this->Paginator->sort('bytes_xfer_avail'); ?></th>
			<th><?php echo $this->Paginator->sort('files_in_avail'); ?></th>
			<th><?php echo $this->Paginator->sort('files_out_avail'); ?></th>
			<th><?php echo $this->Paginator->sort('files_xfer_avail'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($quotaLimits as $quotaLimit): ?>
	<tr>
		<td><?php echo h($quotaLimit['QuotaLimit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quotaLimit['Account']['account_name'], array('controller' => 'accounts', 'action' => 'view', $quotaLimit['Account']['id'])); ?>
		</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['account_name']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['quota_type']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['per_session']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['limit_type']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['bytes_in_avail']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['bytes_out_avail']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['bytes_xfer_avail']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['files_in_avail']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['files_out_avail']); ?>&nbsp;</td>
		<td><?php echo h($quotaLimit['QuotaLimit']['files_xfer_avail']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quotaLimit['QuotaLimit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quotaLimit['QuotaLimit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quotaLimit['QuotaLimit']['id']), null, __('Are you sure you want to delete # %s?', $quotaLimit['QuotaLimit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Quota Limit'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
