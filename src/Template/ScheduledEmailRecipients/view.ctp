<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmailRecipient $scheduledEmailRecipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scheduled Email Recipient'), ['action' => 'edit', $scheduledEmailRecipient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scheduled Email Recipient'), ['action' => 'delete', $scheduledEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scheduledEmailRecipients view large-9 medium-8 columns content">
    <h3><?= h($scheduledEmailRecipient->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Scheduled Email') ?></th>
            <td><?= $scheduledEmailRecipient->has('scheduled_email') ? $this->Html->link($scheduledEmailRecipient->scheduled_email->id, ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmailRecipient->scheduled_email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $scheduledEmailRecipient->has('user') ? $this->Html->link($scheduledEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $scheduledEmailRecipient->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($scheduledEmailRecipient->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scheduledEmailRecipient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Email Sent') ?></th>
            <td><?= $this->Number->format($scheduledEmailRecipient->is_email_sent) ?></td>
        </tr>
    </table>
</div>
