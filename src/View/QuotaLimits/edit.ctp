<div class="quotaLimits form">
<?php echo $this->Form->create('QuotaLimit'); ?>
	<fieldset>
		<legend><?php echo __('Edit Quota Limit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('account_id');
		echo $this->Form->input('account_name');
		echo $this->Form->input('quota_type');
		echo $this->Form->input('per_session');
		echo $this->Form->input('limit_type');
		echo $this->Form->input('bytes_in_avail');
		echo $this->Form->input('bytes_out_avail');
		echo $this->Form->input('bytes_xfer_avail');
		echo $this->Form->input('files_in_avail');
		echo $this->Form->input('files_out_avail');
		echo $this->Form->input('files_xfer_avail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuotaLimit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('QuotaLimit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Quota Limits'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
