<div class="quotaLimits view">
<h2><?php  echo __('Quota Limit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quotaLimit['Account']['account_name'], array('controller' => 'accounts', 'action' => 'view', $quotaLimit['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quota Type'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['quota_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Per Session'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['per_session']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limit Type'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['limit_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bytes In Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['bytes_in_avail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bytes Out Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['bytes_out_avail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bytes Xfer Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['bytes_xfer_avail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files In Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['files_in_avail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files Out Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['files_out_avail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files Xfer Avail'); ?></dt>
		<dd>
			<?php echo h($quotaLimit['QuotaLimit']['files_xfer_avail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quota Limit'), array('action' => 'edit', $quotaLimit['QuotaLimit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quota Limit'), array('action' => 'delete', $quotaLimit['QuotaLimit']['id']), null, __('Are you sure you want to delete # %s?', $quotaLimit['QuotaLimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quota Limits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quota Limit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
