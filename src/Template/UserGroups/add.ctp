<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup $userGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['controller' => 'UserGroupPermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['controller' => 'UserGroupPermissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($userGroup) ?>
    <fieldset>
        <legend><?= __('Add User Group') ?></legend>
        <?php
            echo $this->Form->control('parent_id', ['options' => $parentUserGroups]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('registration_allowed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
