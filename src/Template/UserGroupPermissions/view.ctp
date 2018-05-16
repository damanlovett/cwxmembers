<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroupPermission $userGroupPermission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Group Permission'), ['action' => 'edit', $userGroupPermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Group Permission'), ['action' => 'delete', $userGroupPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userGroupPermissions view large-9 medium-8 columns content">
    <h3><?= h($userGroupPermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $userGroupPermission->has('user_group') ? $this->Html->link($userGroupPermission->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroupPermission->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prefix') ?></th>
            <td><?= h($userGroupPermission->prefix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plugin') ?></th>
            <td><?= h($userGroupPermission->plugin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($userGroupPermission->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($userGroupPermission->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroupPermission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allowed') ?></th>
            <td><?= $this->Number->format($userGroupPermission->allowed) ?></td>
        </tr>
    </table>
</div>
