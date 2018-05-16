<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown $dropdown
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dropdown'), ['action' => 'edit', $dropdown->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dropdown'), ['action' => 'delete', $dropdown->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dropdown'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dropdowns view large-9 medium-8 columns content">
    <h3><?= h($dropdown->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dropdown->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($dropdown->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dropdown->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Shows') ?></h4>
        <?php if (!empty($dropdown->shows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('Dropdown Id') ?></th>
                <th scope="col"><?= __('Schedule') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Signups Open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dropdown->shows as $shows): ?>
            <tr>
                <td><?= h($shows->id) ?></td>
                <td><?= h($shows->month_id) ?></td>
                <td><?= h($shows->dropdown_id) ?></td>
                <td><?= h($shows->schedule) ?></td>
                <td><?= h($shows->notes) ?></td>
                <td><?= h($shows->signups_open) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shows', 'action' => 'view', $shows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shows', 'action' => 'edit', $shows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shows', 'action' => 'delete', $shows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
