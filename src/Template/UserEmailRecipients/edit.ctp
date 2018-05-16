<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailRecipient $userEmailRecipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userEmailRecipient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailRecipient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmailRecipients form large-9 medium-8 columns content">
    <?= $this->Form->create($userEmailRecipient) ?>
    <fieldset>
        <legend><?= __('Edit User Email Recipient') ?></legend>
        <?php
            echo $this->Form->control('user_email_id', ['options' => $userEmails]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('email_address');
            echo $this->Form->control('is_email_sent');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
