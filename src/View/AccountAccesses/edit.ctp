<div class="accountAccesses form">
<?php echo $this->Form->create('AccountAccess'); ?>
	<fieldset>
		<legend><?php echo __('Edit Account Access'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('account_name');
		echo $this->Form->input('host');
		echo $this->Form->input('date');
		echo $this->Form->input('action');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AccountAccess.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AccountAccess.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Account Accesses'), array('action' => 'index')); ?></li>
	</ul>
</div>
