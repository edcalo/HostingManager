<div class="accountActivities index">
	<h2><?php echo __('Account Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_name'); ?></th>
			<th><?php echo $this->Paginator->sort('host'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_activity'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($accountActivities as $accountActivity): ?>
	<tr>
		<td><?php echo h($accountActivity['AccountActivity']['id']); ?>&nbsp;</td>
		<td><?php echo h($accountActivity['AccountActivity']['account_name']); ?>&nbsp;</td>
		<td><?php echo h($accountActivity['AccountActivity']['host']); ?>&nbsp;</td>
		<td><?php echo h($accountActivity['AccountActivity']['date']); ?>&nbsp;</td>
		<td><?php echo h($accountActivity['AccountActivity']['detail_activity']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accountActivity['AccountActivity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accountActivity['AccountActivity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accountActivity['AccountActivity']['id']), null, __('Are you sure you want to delete # %s?', $accountActivity['AccountActivity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Account Activity'), array('action' => 'add')); ?></li>
	</ul>
</div>
