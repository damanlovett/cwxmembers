<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Show'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['controller' => 'Dropdowns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dropdown'), ['controller' => 'Dropdowns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shows index large-9 medium-8 columns content">
    <h3><?= __('Shows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dropdown_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signups_open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shows as $show): ?>
            <tr>
                <td><?= $this->Number->format($show->id) ?></td>
                <td><?= $show->has('month') ? $this->Html->link($show->month->title, ['controller' => 'Months', 'action' => 'view', $show->month->id]) : '' ?></td>
                <td><?= $show->has('dropdown') ? $this->Html->link($show->dropdown->name, ['controller' => 'Dropdowns', 'action' => 'view', $show->dropdown->id]) : '' ?></td>
                <td><?= h($show->schedule) ?></td>
                <td><?= $this->Number->format($show->signups_open) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $show->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
