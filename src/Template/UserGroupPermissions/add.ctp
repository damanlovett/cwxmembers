<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroupPermission $userGroupPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userGroupPermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($userGroupPermission) ?>
    <fieldset>
        <legend><?= __('Add User Group Permission') ?></legend>
        <?php
            echo $this->Form->control('user_group_id', ['options' => $userGroups]);
            echo $this->Form->control('prefix');
            echo $this->Form->control('plugin');
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
            echo $this->Form->control('allowed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
