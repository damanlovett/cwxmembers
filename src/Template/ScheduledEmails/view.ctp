<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmail $scheduledEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scheduled Email'), ['action' => 'edit', $scheduledEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scheduled Email'), ['action' => 'delete', $scheduledEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scheduledEmails view large-9 medium-8 columns content">
    <h3><?= h($scheduledEmail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Email') ?></th>
            <td><?= $scheduledEmail->has('user_email') ? $this->Html->link($scheduledEmail->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $scheduledEmail->user_email->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($scheduledEmail->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $scheduledEmail->has('user_group') ? $this->Html->link($scheduledEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $scheduledEmail->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Name') ?></th>
            <td><?= h($scheduledEmail->from_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Email') ?></th>
            <td><?= h($scheduledEmail->from_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($scheduledEmail->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scheduledEmail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Sent') ?></th>
            <td><?= $this->Number->format($scheduledEmail->is_sent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheduled By') ?></th>
            <td><?= $this->Number->format($scheduledEmail->scheduled_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule Date') ?></th>
            <td><?= h($scheduledEmail->schedule_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scheduledEmail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scheduledEmail->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Cc To') ?></h4>
        <?= $this->Text->autoParagraph(h($scheduledEmail->cc_to)); ?>
    </div>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($scheduledEmail->message)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scheduled Email Recipients') ?></h4>
        <?php if (!empty($scheduledEmail->scheduled_email_recipients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scheduled Email Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Is Email Sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scheduledEmail->scheduled_email_recipients as $scheduledEmailRecipients): ?>
            <tr>
                <td><?= h($scheduledEmailRecipients->id) ?></td>
                <td><?= h($scheduledEmailRecipients->scheduled_email_id) ?></td>
                <td><?= h($scheduledEmailRecipients->user_id) ?></td>
                <td><?= h($scheduledEmailRecipients->email_address) ?></td>
                <td><?= h($scheduledEmailRecipients->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'view', $scheduledEmailRecipients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'edit', $scheduledEmailRecipients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'delete', $scheduledEmailRecipients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
