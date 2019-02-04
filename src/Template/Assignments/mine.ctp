<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment[]|\Cake\Collection\CollectionInterface $assignments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">
            <?= __('Actions') ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Assignment'), ['action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?>
        </li>
        <li>
            <?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>
<div class="assignments index large-9 medium-8 columns content">
    <h3>
        <?= __('Assignments') ?>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">
                    <?= $this->Paginator->sort('id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('show_id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('user_id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('signup_id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('role_id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('role2_id') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('callout') ?>
                </th>
                <th scope="col" class="actions">
                    <?= __('Actions') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment) : ?>
            <tr>
                <td>
                    <?= $assignment->Dropdown['name'] ?>
                </td>
                <td>
                    <?= $assignment->has('show') ? $this->Html->link($assignment->show->DisplayName, ['controller' => 'Shows', 'action' => 'view', $assignment->show->id]) : '' ?>
                </td>
                <td>
                    <?= $assignment->has('user') ? $this->Html->link($assignment->user->DisplayName, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?>
                </td>
                <td>
                    <?= $assignment->has('signup') ? $this->Html->link($assignment->signup->id, ['controller' => 'Signups', 'action' => 'view', $assignment->signup->id]) : '' ?>
                </td>
                <td>
                    <?= $assignment->has('role') ? $this->Html->link($assignment->role->name, ['controller' => 'Roles', 'action' => 'view', $assignment->role->id]) : '' ?>
                </td>
                <td>
                    <?= $assignment->has('roles2') ? $this->Html->link($assignment->roles2->name, ['controller' => 'Roles', 'action' => 'view', $assignment->roles2->id]) : '' ?>
                </td>
                <td>
                    <?= $this->Number->format($assignment->callout) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p>
            <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
        </p>
    </div>
</div>