<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserActivity $userActivity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Activity'), ['action' => 'edit', $userActivity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Activity'), ['action' => 'delete', $userActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userActivity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userActivities view large-9 medium-8 columns content">
    <h3><?= h($userActivity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Useragent') ?></th>
            <td><?= h($userActivity->useragent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userActivity->has('user') ? $this->Html->link($userActivity->user->id, ['controller' => 'Users', 'action' => 'view', $userActivity->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($userActivity->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userActivity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Action') ?></th>
            <td><?= $this->Number->format($userActivity->last_action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logout') ?></th>
            <td><?= $this->Number->format($userActivity->logout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($userActivity->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userActivity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userActivity->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Last Url') ?></h4>
        <?= $this->Text->autoParagraph(h($userActivity->last_url)); ?>
    </div>
    <div class="row">
        <h4><?= __('User Browser') ?></h4>
        <?= $this->Text->autoParagraph(h($userActivity->user_browser)); ?>
    </div>
</div>
