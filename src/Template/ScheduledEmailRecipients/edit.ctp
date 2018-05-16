<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScheduledEmailRecipient $scheduledEmailRecipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scheduledEmailRecipient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scheduledEmailRecipients form large-9 medium-8 columns content">
    <?= $this->Form->create($scheduledEmailRecipient) ?>
    <fieldset>
        <legend><?= __('Edit Scheduled Email Recipient') ?></legend>
        <?php
            echo $this->Form->control('scheduled_email_id', ['options' => $scheduledEmails]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('email_address');
            echo $this->Form->control('is_email_sent');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
