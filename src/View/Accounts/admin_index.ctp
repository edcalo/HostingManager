<div class="accounts index">
    <h2><?php echo __('Accounts'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('server_id'); ?></th>
            <th><?php echo $this->Paginator->sort('account_name'); ?></th>
            <th><?php echo $this->Paginator->sort('account_description'); ?></th>
            <th><?php echo $this->Paginator->sort('account_password'); ?></th>
            <th><?php echo $this->Paginator->sort('uid'); ?></th>
            <th><?php echo $this->Paginator->sort('gid'); ?></th>
            <th><?php echo $this->Paginator->sort('home_dir'); ?></th>
            <th><?php echo $this->Paginator->sort('shell'); ?></th>
            <th><?php echo $this->Paginator->sort('count'); ?></th>
            <th><?php echo $this->Paginator->sort('accessed'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th><?php echo $this->Paginator->sort('expired'); ?></th>
            <th><?php echo $this->Paginator->sort('status'); ?></th>
            <th><?php echo $this->Paginator->sort('is_delete'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?php echo h($account['Account']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($account['User']['title'], array('controller' => 'users', 'action' => 'view', $account['User']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($account['Server']['server_name'], array('controller' => 'servers', 'action' => 'view', $account['Server']['id'])); ?>
                </td>
                <td><?php echo h($account['Account']['account_name']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['account_description']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['account_password']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['uid']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['gid']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['home_dir']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['shell']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['count']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['accessed']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['modified']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['expired']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['status']); ?>&nbsp;</td>
                <td><?php echo h($account['Account']['is_delete']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $account['Account']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $account['Account']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $account['Account']['id']), null, __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Quota Limits'), array('controller' => 'quota_limits', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Quota Limit'), array('controller' => 'quota_limits', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Quota Tallies'), array('controller' => 'quota_tallies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Quota Tally'), array('controller' => 'quota_tallies', 'action' => 'add')); ?> </li>
    </ul>
</div>
