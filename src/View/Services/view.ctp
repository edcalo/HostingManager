<div class="services view">
<h2><?php  echo __('Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($service['Service']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Name'); ?></dt>
		<dd>
			<?php echo h($service['Service']['service_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Description'); ?></dt>
		<dd>
			<?php echo h($service['Service']['service_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Port'); ?></dt>
		<dd>
			<?php echo h($service['Service']['service_port']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Service'), array('action' => 'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Service'), array('action' => 'delete', $service['Service']['id']), null, __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Servers'); ?></h3>
	<?php if (!empty($service['Server'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Server Name'); ?></th>
		<th><?php echo __('Fully Qualified Domain Name'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th><?php echo __('Server Description'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($service['Server'] as $server): ?>
		<tr>
			<td><?php echo $server['id']; ?></td>
			<td><?php echo $server['server_name']; ?></td>
			<td><?php echo $server['fully_qualified_domain_name']; ?></td>
			<td><?php echo $server['ip']; ?></td>
			<td><?php echo $server['server_description']; ?></td>
			<td><?php echo $server['is_active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servers', 'action' => 'view', $server['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servers', 'action' => 'edit', $server['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servers', 'action' => 'delete', $server['id']), null, __('Are you sure you want to delete # %s?', $server['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
