<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmail[]|\Cake\Collection\CollectionInterface $userEmails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['controller' => 'UserEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['controller' => 'UserEmailRecipients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmails index large-9 medium-8 columns content">
    <h3><?= __('User Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sent_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userEmails as $userEmail): ?>
            <tr>
                <td><?= $this->Number->format($userEmail->id) ?></td>
                <td><?= h($userEmail->type) ?></td>
                <td><?= $userEmail->has('user_group') ? $this->Html->link($userEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userEmail->user_group->id]) : '' ?></td>
                <td><?= h($userEmail->from_name) ?></td>
                <td><?= h($userEmail->from_email) ?></td>
                <td><?= h($userEmail->subject) ?></td>
                <td><?= $this->Number->format($userEmail->sent_by) ?></td>
                <td><?= h($userEmail->created) ?></td>
                <td><?= h($userEmail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userEmail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userEmail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmail->id)]) ?>
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
