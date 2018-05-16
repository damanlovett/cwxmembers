<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSocial $userSocial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Social'), ['action' => 'edit', $userSocial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Social'), ['action' => 'delete', $userSocial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Socials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userSocials view large-9 medium-8 columns content">
    <h3><?= h($userSocial->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userSocial->has('user') ? $this->Html->link($userSocial->user->id, ['controller' => 'Users', 'action' => 'view', $userSocial->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($userSocial->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Socialid') ?></th>
            <td><?= h($userSocial->socialid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userSocial->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userSocial->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userSocial->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Access Token') ?></h4>
        <?= $this->Text->autoParagraph(h($userSocial->access_token)); ?>
    </div>
    <div class="row">
        <h4><?= __('Access Secret') ?></h4>
        <?= $this->Text->autoParagraph(h($userSocial->access_secret)); ?>
    </div>
</div>
