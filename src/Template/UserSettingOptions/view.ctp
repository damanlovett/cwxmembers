<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSettingOption $userSettingOption
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Setting Option'), ['action' => 'edit', $userSettingOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Setting Option'), ['action' => 'delete', $userSettingOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSettingOption->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Settings'), ['controller' => 'UserSettings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Setting'), ['controller' => 'UserSettings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Setting Options'), ['controller' => 'SettingOptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting Option'), ['controller' => 'SettingOptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userSettingOptions view large-9 medium-8 columns content">
    <h3><?= h($userSettingOption->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Setting') ?></th>
            <td><?= $userSettingOption->has('user_setting') ? $this->Html->link($userSettingOption->user_setting->name, ['controller' => 'UserSettings', 'action' => 'view', $userSettingOption->user_setting->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setting Option') ?></th>
            <td><?= $userSettingOption->has('setting_option') ? $this->Html->link($userSettingOption->setting_option->title, ['controller' => 'SettingOptions', 'action' => 'view', $userSettingOption->setting_option->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userSettingOption->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userSettingOption->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userSettingOption->modified) ?></td>
        </tr>
    </table>
</div>
