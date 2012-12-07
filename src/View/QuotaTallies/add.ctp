<div class="quotaTallies form">
<?php echo $this->Form->create('QuotaTally'); ?>
	<fieldset>
		<legend><?php echo __('Add Quota Tally'); ?></legend>
	<?php
		echo $this->Form->input('account_id');
		echo $this->Form->input('account_name');
		echo $this->Form->input('bytes_in_used');
		echo $this->Form->input('bytes_out_used');
		echo $this->Form->input('files_in_used');
		echo $this->Form->input('files_out_userd');
		echo $this->Form->input('files_xfer_used');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Quota Tallies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
