<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice[]|\Cake\Collection\CollectionInterface $practices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Practice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="practices index large-9 medium-8 columns content">
    <h3><?= __('Practices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('month_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leader') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practices as $practice): ?>
            <tr>
                <td><?= $practice->has('month') ? $this->Html->link($practice->month->title, ['controller' => 'Months', 'action' => 'view', $practice->month->id]) : '' ?></td>
                <td><?= h($practice->schedule) ?></td>
                <td><?= h($practice->title) ?></td>
                <td><?= h($practice->leader) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $practice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $practice->id]) ?>
                    <?= $this->Html->link(__('Checkin'), ['action' => 'checkin', $practice->id]) ?>
                    <br />
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $practice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practice->id)]) ?>
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
