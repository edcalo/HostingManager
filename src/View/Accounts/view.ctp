<div class="accounts view">
<h2><?php  echo __('Account'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($account['Account']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($account['User']['email'], array('controller' => 'users', 'action' => 'view', $account['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($account['Account']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Password'); ?></dt>
		<dd>
			<?php echo h($account['Account']['account_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uid'); ?></dt>
		<dd>
			<?php echo h($account['Account']['uid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gid'); ?></dt>
		<dd>
			<?php echo h($account['Account']['gid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Dir'); ?></dt>
		<dd>
			<?php echo h($account['Account']['home_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shell'); ?></dt>
		<dd>
			<?php echo h($account['Account']['shell']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count'); ?></dt>
		<dd>
			<?php echo h($account['Account']['count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accessed'); ?></dt>
		<dd>
			<?php echo h($account['Account']['accessed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expired'); ?></dt>
		<dd>
			<?php echo h($account['Account']['expired']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), null, __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Limits'), array('controller' => 'quota_limits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Limit'), array('controller' => 'quota_limits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Tallies'), array('controller' => 'quota_tallies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Tally'), array('controller' => 'quota_tallies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Quota Limits'); ?></h3>
	<?php if (!empty($account['QuotaLimit'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Quota Type'); ?></th>
		<th><?php echo __('Per Session'); ?></th>
		<th><?php echo __('Limit Type'); ?></th>
		<th><?php echo __('Bytes In Avail'); ?></th>
		<th><?php echo __('Bytes Out Avail'); ?></th>
		<th><?php echo __('Bytes Xfer Avail'); ?></th>
		<th><?php echo __('Files In Avail'); ?></th>
		<th><?php echo __('Files Out Avail'); ?></th>
		<th><?php echo __('Files Xfer Avail'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['QuotaLimit'] as $quotaLimit): ?>
		<tr>
			<td><?php echo $quotaLimit['id']; ?></td>
			<td><?php echo $quotaLimit['account_id']; ?></td>
			<td><?php echo $quotaLimit['account_name']; ?></td>
			<td><?php echo $quotaLimit['quota_type']; ?></td>
			<td><?php echo $quotaLimit['per_session']; ?></td>
			<td><?php echo $quotaLimit['limit_type']; ?></td>
			<td><?php echo $quotaLimit['bytes_in_avail']; ?></td>
			<td><?php echo $quotaLimit['bytes_out_avail']; ?></td>
			<td><?php echo $quotaLimit['bytes_xfer_avail']; ?></td>
			<td><?php echo $quotaLimit['files_in_avail']; ?></td>
			<td><?php echo $quotaLimit['files_out_avail']; ?></td>
			<td><?php echo $quotaLimit['files_xfer_avail']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quota_limits', 'action' => 'view', $quotaLimit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quota_limits', 'action' => 'edit', $quotaLimit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quota_limits', 'action' => 'delete', $quotaLimit['id']), null, __('Are you sure you want to delete # %s?', $quotaLimit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Quota Limit'), array('controller' => 'quota_limits', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Quota Tallies'); ?></h3>
	<?php if (!empty($account['QuotaTally'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Bytes In Used'); ?></th>
		<th><?php echo __('Bytes Out Used'); ?></th>
		<th><?php echo __('Files In Used'); ?></th>
		<th><?php echo __('Files Out Userd'); ?></th>
		<th><?php echo __('Files Xfer Used'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['QuotaTally'] as $quotaTally): ?>
		<tr>
			<td><?php echo $quotaTally['id']; ?></td>
			<td><?php echo $quotaTally['account_id']; ?></td>
			<td><?php echo $quotaTally['account_name']; ?></td>
			<td><?php echo $quotaTally['bytes_in_used']; ?></td>
			<td><?php echo $quotaTally['bytes_out_used']; ?></td>
			<td><?php echo $quotaTally['files_in_used']; ?></td>
			<td><?php echo $quotaTally['files_out_userd']; ?></td>
			<td><?php echo $quotaTally['files_xfer_used']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quota_tallies', 'action' => 'view', $quotaTally['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quota_tallies', 'action' => 'edit', $quotaTally['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quota_tallies', 'action' => 'delete', $quotaTally['id']), null, __('Are you sure you want to delete # %s?', $quotaTally['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Quota Tally'), array('controller' => 'quota_tallies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Servers'); ?></h3>
	<?php if (!empty($account['Server'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Server Name'); ?></th>
		<th><?php echo __('Fully Qualified Domain Name'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th><?php echo __('Server Description'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Server'] as $server): ?>
		<tr>
			<td><?php echo $server['id']; ?></td>
			<td><?php echo $server['server_name']; ?></td>
			<td><?php echo $server['fully_qualified_domain_name']; ?></td>
			<td><?php echo $server['ip']; ?></td>
			<td><?php echo $server['server_description']; ?></td>
			<td><?php echo $server['is_active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servers', 'action' => 'view', $server['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servers', 'action' => 'edit', $server['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servers', 'action' => 'delete', $server['id']), null, __('Are you sure you want to delete # %s?', $server['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
