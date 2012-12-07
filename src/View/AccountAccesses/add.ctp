<div class="accountAccesses form">
<?php echo $this->Form->create('AccountAccess'); ?>
	<fieldset>
		<legend><?php echo __('Add Account Access'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Account Accesses'), array('action' => 'index')); ?></li>
	</ul>
</div>
