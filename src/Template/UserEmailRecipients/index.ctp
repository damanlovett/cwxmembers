<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailRecipient[]|\Cake\Collection\CollectionInterface $userEmailRecipients
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmailRecipients index large-9 medium-8 columns content">
    <h3><?= __('User Email Recipients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_email_sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userEmailRecipients as $userEmailRecipient): ?>
            <tr>
                <td><?= $this->Number->format($userEmailRecipient->id) ?></td>
                <td><?= $userEmailRecipient->has('user_email') ? $this->Html->link($userEmailRecipient->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $userEmailRecipient->user_email->id]) : '' ?></td>
                <td><?= $userEmailRecipient->has('user') ? $this->Html->link($userEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailRecipient->user->id]) : '' ?></td>
                <td><?= h($userEmailRecipient->email_address) ?></td>
                <td><?= $this->Number->format($userEmailRecipient->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userEmailRecipient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userEmailRecipient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailRecipient->id)]) ?>
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
