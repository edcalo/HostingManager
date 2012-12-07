<div class="accounts form">
<?php echo $this->Form->create('Account'); ?>
	<fieldset>
		<legend><?php echo __('Edit Account'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('account_name');
		echo $this->Form->input('account_password');
		echo $this->Form->input('uid');
		echo $this->Form->input('gid');
		echo $this->Form->input('home_dir');
		echo $this->Form->input('shell');
		echo $this->Form->input('count');
		echo $this->Form->input('accessed');
		echo $this->Form->input('expired');
		echo $this->Form->input('Server');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Account.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Account.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?></li>
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
