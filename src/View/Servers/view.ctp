<div class="servers view">
<h2><?php  echo __('Server'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($server['Server']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Server Name'); ?></dt>
		<dd>
			<?php echo h($server['Server']['server_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fully Qualified Domain Name'); ?></dt>
		<dd>
			<?php echo h($server['Server']['fully_qualified_domain_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($server['Server']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Server Description'); ?></dt>
		<dd>
			<?php echo h($server['Server']['server_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($server['Server']['is_active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Server'), array('action' => 'edit', $server['Server']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Server'), array('action' => 'delete', $server['Server']['id']), null, __('Are you sure you want to delete # %s?', $server['Server']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Accounts'); ?></h3>
	<?php if (!empty($server['Account'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Account Password'); ?></th>
		<th><?php echo __('Uid'); ?></th>
		<th><?php echo __('Gid'); ?></th>
		<th><?php echo __('Home Dir'); ?></th>
		<th><?php echo __('Shell'); ?></th>
		<th><?php echo __('Count'); ?></th>
		<th><?php echo __('Accessed'); ?></th>
		<th><?php echo __('Expired'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($server['Account'] as $account): ?>
		<tr>
			<td><?php echo $account['id']; ?></td>
			<td><?php echo $account['user_id']; ?></td>
			<td><?php echo $account['account_name']; ?></td>
			<td><?php echo $account['account_password']; ?></td>
			<td><?php echo $account['uid']; ?></td>
			<td><?php echo $account['gid']; ?></td>
			<td><?php echo $account['home_dir']; ?></td>
			<td><?php echo $account['shell']; ?></td>
			<td><?php echo $account['count']; ?></td>
			<td><?php echo $account['accessed']; ?></td>
			<td><?php echo $account['expired']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'accounts', 'action' => 'view', $account['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'accounts', 'action' => 'edit', $account['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'accounts', 'action' => 'delete', $account['id']), null, __('Are you sure you want to delete # %s?', $account['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
