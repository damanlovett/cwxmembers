<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assignment'), ['action' => 'edit', $assignment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assignment'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assignments view large-9 medium-8 columns content">
    <h3><?= h($assignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Show') ?></th>
            <td><?= $assignment->has('show') ? $this->Html->link($assignment->show->id, ['controller' => 'Shows', 'action' => 'view', $assignment->show->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $assignment->has('user') ? $this->Html->link($assignment->user->id, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signup') ?></th>
            <td><?= $assignment->has('signup') ? $this->Html->link($assignment->signup->id, ['controller' => 'Signups', 'action' => 'view', $assignment->signup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $assignment->has('role') ? $this->Html->link($assignment->role->name, ['controller' => 'Roles', 'action' => 'view', $assignment->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($assignment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role Id') ?></th>
            <td><?= $this->Number->format($assignment->role_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Callout') ?></th>
            <td><?= $this->Number->format($assignment->callout) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($assignment->notes)); ?>
    </div>
</div>
