<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown[]|\Cake\Collection\CollectionInterface $dropdowns
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dropdown'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dropdowns index large-9 medium-8 columns content">
    <h3><?= __('Dropdowns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dropdowns as $dropdown): ?>
            <tr>
                <td><?= $this->Number->format($dropdown->id) ?></td>
                <td><?= h($dropdown->name) ?></td>
                <td><?= h($dropdown->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dropdown->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dropdown->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dropdown->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]) ?>
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
