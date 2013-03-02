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
			<?php echo $this->Html->link($account['User']['title'], array('controller' => 'users', 'action' => 'view', $account['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Server'); ?></dt>
		<dd>
			<?php echo $this->Html->link($account['Server']['server_name'], array('controller' => 'servers', 'action' => 'view', $account['Server']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($account['Account']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Description'); ?></dt>
		<dd>
			<?php echo h($account['Account']['account_description']); ?>
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
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($account['Account']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expired'); ?></dt>
		<dd>
			<?php echo h($account['Account']['expired']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($account['Account']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Delete'); ?></dt>
		<dd>
			<?php echo h($account['Account']['is_delete']); ?>
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
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Limits'), array('controller' => 'quota_limits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Limit'), array('controller' => 'quota_limits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Tallies'), array('controller' => 'quota_tallies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Tally'), array('controller' => 'quota_tallies', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Quota Limits'); ?></h3>
	<?php if (!empty($account['QuotaLimit'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Account Id'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['account_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['account_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Quota Type'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['quota_type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Per Session'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['per_session']; ?>
&nbsp;</dd>
		<dt><?php echo __('Limit Type'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['limit_type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bytes In Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['bytes_in_avail']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bytes Out Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['bytes_out_avail']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bytes Xfer Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['bytes_xfer_avail']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files In Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['files_in_avail']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files Out Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['files_out_avail']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files Xfer Avail'); ?></dt>
		<dd>
	<?php echo $account['QuotaLimit']['files_xfer_avail']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Quota Limit'), array('controller' => 'quota_limits', 'action' => 'edit', $account['QuotaLimit']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Quota Tallies'); ?></h3>
	<?php if (!empty($account['QuotaTally'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Account Id'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['account_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['account_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bytes In Used'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['bytes_in_used']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bytes Out Used'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['bytes_out_used']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files In Used'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['files_in_used']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files Out Userd'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['files_out_userd']; ?>
&nbsp;</dd>
		<dt><?php echo __('Files Xfer Used'); ?></dt>
		<dd>
	<?php echo $account['QuotaTally']['files_xfer_used']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Quota Tally'), array('controller' => 'quota_tallies', 'action' => 'edit', $account['QuotaTally']['id'])); ?></li>
			</ul>
		</div>
	</div>
	