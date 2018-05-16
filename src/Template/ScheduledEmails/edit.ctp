<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmail $scheduledEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scheduledEmail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scheduledEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($scheduledEmail) ?>
    <fieldset>
        <legend><?= __('Edit Scheduled Email') ?></legend>
        <?php
            echo $this->Form->control('user_email_id', ['options' => $userEmails, 'empty' => true]);
            echo $this->Form->control('type');
            echo $this->Form->control('user_group_id', ['options' => $userGroups, 'empty' => true]);
            echo $this->Form->control('cc_to');
            echo $this->Form->control('from_name');
            echo $this->Form->control('from_email');
            echo $this->Form->control('subject');
            echo $this->Form->control('message');
            echo $this->Form->control('schedule_date', ['empty' => true]);
            echo $this->Form->control('is_sent');
            echo $this->Form->control('scheduled_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
