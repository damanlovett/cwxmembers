<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmail $userEmail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userEmail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userEmail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['controller' => 'UserEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['controller' => 'UserEmailRecipients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($userEmail) ?>
    <fieldset>
        <legend><?= __('Edit User Email') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('user_group_id', ['options' => $userGroups, 'empty' => true]);
            echo $this->Form->control('cc_to');
            echo $this->Form->control('from_name');
            echo $this->Form->control('from_email');
            echo $this->Form->control('subject');
            echo $this->Form->control('message');
            echo $this->Form->control('sent_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
