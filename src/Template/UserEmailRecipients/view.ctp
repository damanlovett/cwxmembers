<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailRecipient $userEmailRecipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Email Recipient'), ['action' => 'edit', $userEmailRecipient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Email Recipient'), ['action' => 'delete', $userEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailRecipient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userEmailRecipients view large-9 medium-8 columns content">
    <h3><?= h($userEmailRecipient->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Email') ?></th>
            <td><?= $userEmailRecipient->has('user_email') ? $this->Html->link($userEmailRecipient->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $userEmailRecipient->user_email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userEmailRecipient->has('user') ? $this->Html->link($userEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailRecipient->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($userEmailRecipient->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userEmailRecipient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Email Sent') ?></th>
            <td><?= $this->Number->format($userEmailRecipient->is_email_sent) ?></td>
        </tr>
    </table>
</div>
