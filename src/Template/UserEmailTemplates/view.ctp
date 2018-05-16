<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailTemplate $userEmailTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Email Template'), ['action' => 'edit', $userEmailTemplate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Email Template'), ['action' => 'delete', $userEmailTemplate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailTemplate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Email Templates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Template'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userEmailTemplates view large-9 medium-8 columns content">
    <h3><?= h($userEmailTemplate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userEmailTemplate->has('user') ? $this->Html->link($userEmailTemplate->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailTemplate->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Template Name') ?></th>
            <td><?= h($userEmailTemplate->template_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userEmailTemplate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userEmailTemplate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userEmailTemplate->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Header') ?></h4>
        <?= $this->Text->autoParagraph(h($userEmailTemplate->header)); ?>
    </div>
    <div class="row">
        <h4><?= __('Footer') ?></h4>
        <?= $this->Text->autoParagraph(h($userEmailTemplate->footer)); ?>
    </div>
</div>
