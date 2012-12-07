<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($user['User']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($user['User']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Accounts'); ?></h3>
	<?php if (!empty($user['Account'])): ?>
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
		foreach ($user['Account'] as $account): ?>
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
