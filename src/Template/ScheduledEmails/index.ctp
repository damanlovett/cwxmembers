<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmail[]|\Cake\Collection\CollectionInterface $scheduledEmails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scheduledEmails index large-9 medium-8 columns content">
    <h3><?= __('Scheduled Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheduled_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scheduledEmails as $scheduledEmail): ?>
            <tr>
                <td><?= $this->Number->format($scheduledEmail->id) ?></td>
                <td><?= $scheduledEmail->has('user_email') ? $this->Html->link($scheduledEmail->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $scheduledEmail->user_email->id]) : '' ?></td>
                <td><?= h($scheduledEmail->type) ?></td>
                <td><?= $scheduledEmail->has('user_group') ? $this->Html->link($scheduledEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $scheduledEmail->user_group->id]) : '' ?></td>
                <td><?= h($scheduledEmail->from_name) ?></td>
                <td><?= h($scheduledEmail->from_email) ?></td>
                <td><?= h($scheduledEmail->subject) ?></td>
                <td><?= h($scheduledEmail->schedule_date) ?></td>
                <td><?= $this->Number->format($scheduledEmail->is_sent) ?></td>
                <td><?= $this->Number->format($scheduledEmail->scheduled_by) ?></td>
                <td><?= h($scheduledEmail->created) ?></td>
                <td><?= h($scheduledEmail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scheduledEmail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheduledEmail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheduledEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
