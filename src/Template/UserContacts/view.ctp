<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserContact $userContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Contact'), ['action' => 'edit', $userContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Contact'), ['action' => 'delete', $userContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userContacts view large-9 medium-8 columns content">
    <h3><?= h($userContact->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userContact->has('user') ? $this->Html->link($userContact->user->id, ['controller' => 'Users', 'action' => 'view', $userContact->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($userContact->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($userContact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($userContact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userContact->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userContact->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userContact->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Requirement') ?></h4>
        <?= $this->Text->autoParagraph(h($userContact->requirement)); ?>
    </div>
    <div class="row">
        <h4><?= __('Reply Message') ?></h4>
        <?= $this->Text->autoParagraph(h($userContact->reply_message)); ?>
    </div>
</div>
