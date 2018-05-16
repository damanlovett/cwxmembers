<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmailRecipient[]|\Cake\Collection\CollectionInterface $scheduledEmailRecipients
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scheduledEmailRecipients index large-9 medium-8 columns content">
    <h3><?= __('Scheduled Email Recipients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheduled_email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_email_sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scheduledEmailRecipients as $scheduledEmailRecipient): ?>
            <tr>
                <td><?= $this->Number->format($scheduledEmailRecipient->id) ?></td>
                <td><?= $scheduledEmailRecipient->has('scheduled_email') ? $this->Html->link($scheduledEmailRecipient->scheduled_email->id, ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmailRecipient->scheduled_email->id]) : '' ?></td>
                <td><?= $scheduledEmailRecipient->has('user') ? $this->Html->link($scheduledEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $scheduledEmailRecipient->user->id]) : '' ?></td>
                <td><?= h($scheduledEmailRecipient->email_address) ?></td>
                <td><?= $this->Number->format($scheduledEmailRecipient->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scheduledEmailRecipient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheduledEmailRecipient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheduledEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipient->id)]) ?>
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
