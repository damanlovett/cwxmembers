<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($role->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($role->assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Signup Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Role2 Id') ?></th>
                <th scope="col"><?= __('Callout') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->assignments as $assignments): ?>
            <tr>
                <td><?= h($assignments->id) ?></td>
                <td><?= h($assignments->show_id) ?></td>
                <td><?= h($assignments->user_id) ?></td>
                <td><?= h($assignments->signup_id) ?></td>
                <td><?= h($assignments->role_id) ?></td>
                <td><?= h($assignments->role2_id) ?></td>
                <td><?= h($assignments->callout) ?></td>
                <td><?= h($assignments->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
