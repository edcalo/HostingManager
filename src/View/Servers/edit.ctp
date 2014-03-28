<div class="servers form">
<?php echo $this->Form->create('Server'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Server'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('server_name');
		echo $this->Form->input('fully_qualified_domain_name');
		echo $this->Form->input('ip');
		echo $this->Form->input('server_description');
		echo $this->Form->input('is_active');
		echo $this->Form->input('is_delete');
		echo $this->Form->input('Account');
		echo $this->Form->input('Service');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Server.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Server.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Servers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
