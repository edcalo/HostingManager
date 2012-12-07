<div class="accountActivities view">
<h2><?php  echo __('Account Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accountActivity['AccountActivity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($accountActivity['AccountActivity']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Host'); ?></dt>
		<dd>
			<?php echo h($accountActivity['AccountActivity']['host']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($accountActivity['AccountActivity']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail Activity'); ?></dt>
		<dd>
			<?php echo h($accountActivity['AccountActivity']['detail_activity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account Activity'), array('action' => 'edit', $accountActivity['AccountActivity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account Activity'), array('action' => 'delete', $accountActivity['AccountActivity']['id']), null, __('Are you sure you want to delete # %s?', $accountActivity['AccountActivity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Account Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account Activity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
