<div class="accountAccesses view">
<h2><?php  echo __('Account Access'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accountAccess['AccountAccess']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($accountAccess['AccountAccess']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Host'); ?></dt>
		<dd>
			<?php echo h($accountAccess['AccountAccess']['host']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($accountAccess['AccountAccess']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($accountAccess['AccountAccess']['action']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account Access'), array('action' => 'edit', $accountAccess['AccountAccess']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account Access'), array('action' => 'delete', $accountAccess['AccountAccess']['id']), null, __('Are you sure you want to delete # %s?', $accountAccess['AccountAccess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Account Accesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account Access'), array('action' => 'add')); ?> </li>
	</ul>
</div>
