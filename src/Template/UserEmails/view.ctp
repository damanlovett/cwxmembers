<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmail $userEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Email'), ['action' => 'edit', $userEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Email'), ['action' => 'delete', $userEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['controller' => 'UserEmailRecipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['controller' => 'UserEmailRecipients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userEmails view large-9 medium-8 columns content">
    <h3><?= h($userEmail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($userEmail->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $userEmail->has('user_group') ? $this->Html->link($userEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userEmail->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Name') ?></th>
            <td><?= h($userEmail->from_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Email') ?></th>
            <td><?= h($userEmail->from_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($userEmail->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userEmail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sent By') ?></th>
            <td><?= $this->Number->format($userEmail->sent_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userEmail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userEmail->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cc To') ?></h4>
        <?= $this->Text->autoParagraph(h($userEmail->cc_to)); ?>
    </div>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($userEmail->message)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scheduled Emails') ?></h4>
        <?php if (!empty($userEmail->scheduled_emails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Email Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Cc To') ?></th>
                <th scope="col"><?= __('From Name') ?></th>
                <th scope="col"><?= __('From Email') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Schedule Date') ?></th>
                <th scope="col"><?= __('Is Sent') ?></th>
                <th scope="col"><?= __('Scheduled By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userEmail->scheduled_emails as $scheduledEmails): ?>
            <tr>
                <td><?= h($scheduledEmails->id) ?></td>
                <td><?= h($scheduledEmails->user_email_id) ?></td>
                <td><?= h($scheduledEmails->type) ?></td>
                <td><?= h($scheduledEmails->user_group_id) ?></td>
                <td><?= h($scheduledEmails->cc_to) ?></td>
                <td><?= h($scheduledEmails->from_name) ?></td>
                <td><?= h($scheduledEmails->from_email) ?></td>
                <td><?= h($scheduledEmails->subject) ?></td>
                <td><?= h($scheduledEmails->message) ?></td>
                <td><?= h($scheduledEmails->schedule_date) ?></td>
                <td><?= h($scheduledEmails->is_sent) ?></td>
                <td><?= h($scheduledEmails->scheduled_by) ?></td>
                <td><?= h($scheduledEmails->created) ?></td>
                <td><?= h($scheduledEmails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScheduledEmails', 'action' => 'edit', $scheduledEmails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScheduledEmails', 'action' => 'delete', $scheduledEmails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Email Recipients') ?></h4>
        <?php if (!empty($userEmail->user_email_recipients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Email Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Is Email Sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userEmail->user_email_recipients as $userEmailRecipients): ?>
            <tr>
                <td><?= h($userEmailRecipients->id) ?></td>
                <td><?= h($userEmailRecipients->user_email_id) ?></td>
                <td><?= h($userEmailRecipients->user_id) ?></td>
                <td><?= h($userEmailRecipients->email_address) ?></td>
                <td><?= h($userEmailRecipients->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserEmailRecipients', 'action' => 'view', $userEmailRecipients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserEmailRecipients', 'action' => 'edit', $userEmailRecipients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserEmailRecipients', 'action' => 'delete', $userEmailRecipients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailRecipients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
