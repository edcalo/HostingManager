<div class="servers form">
<?php echo $this->Form->create('Server'); ?>
	<fieldset>
		<legend><?php echo __('Add Server'); ?></legend>
	<?php
		echo $this->Form->input('server_name');
		echo $this->Form->input('fully_qualified_domain_name');
		echo $this->Form->input('ip');
		echo $this->Form->input('server_description');
		echo $this->Form->input('is_active');
		echo $this->Form->input('Account');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Servers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
