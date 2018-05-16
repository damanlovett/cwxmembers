<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginToken $loginToken
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login Token'), ['action' => 'edit', $loginToken->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login Token'), ['action' => 'delete', $loginToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginToken->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Login Tokens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login Token'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loginTokens view large-9 medium-8 columns content">
    <h3><?= h($loginToken->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $loginToken->has('user') ? $this->Html->link($loginToken->user->id, ['controller' => 'Users', 'action' => 'view', $loginToken->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token') ?></th>
            <td><?= h($loginToken->token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($loginToken->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loginToken->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expires') ?></th>
            <td><?= h($loginToken->expires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($loginToken->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Used') ?></th>
            <td><?= $loginToken->used ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
