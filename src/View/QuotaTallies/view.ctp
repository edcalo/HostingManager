<div class="quotaTallies view">
<h2><?php  echo __('Quota Tally'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotaTally['Account']['account_name'], array('controller' => 'accounts', 'action' => 'view', $quotaTally['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bytes In Used'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['bytes_in_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bytes Out Used'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['bytes_out_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files In Used'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['files_in_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files Out Userd'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['files_out_userd']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files Xfer Used'); ?></dt>
		<dd>
			<?php echo h($quotaTally['QuotaTally']['files_xfer_used']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quota Tally'), array('action' => 'edit', $quotaTally['QuotaTally']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quota Tally'), array('action' => 'delete', $quotaTally['QuotaTally']['id']), null, __('Are you sure you want to delete # %s?', $quotaTally['QuotaTally']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Tallies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Tally'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
