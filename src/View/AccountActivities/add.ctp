<div class="accountActivities form">
<?php echo $this->Form->create('AccountActivity'); ?>
	<fieldset>
		<legend><?php echo __('Add Account Activity'); ?></legend>
	<?php
		echo $this->Form->input('account_name');
		echo $this->Form->input('host');
		echo $this->Form->input('date');
		echo $this->Form->input('detail_activity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Account Activities'), array('action' => 'index')); ?></li>
	</ul>
</div>
