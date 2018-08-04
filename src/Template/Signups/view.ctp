<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Signup $signup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Signup'), ['action' => 'edit', $signup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Signup'), ['action' => 'delete', $signup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Signups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Signup'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="signups view large-9 medium-8 columns content">
    <h3><?= h($signup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Show') ?></th>
            <td><?= $signup->has('show') ? $this->Html->link($signup->show->id, ['controller' => 'Shows', 'action' => 'view', $signup->show->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $signup->has('user') ? $this->Html->link($signup->user->id, ['controller' => 'Users', 'action' => 'view', $signup->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($signup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($signup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($signup->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $signup->notes; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($signup->assignments)): ?>
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
            <?php foreach ($signup->assignments as $assignments): ?>
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
