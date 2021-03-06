<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Signup[]|\Cake\Collection\CollectionInterface $signups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Signup'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="signups index large-9 medium-8 columns content">
    <h3><?= __('Signups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= h('id') ?></th>
                <th scope="col"><?= h('show_id') ?></th>
                <th scope="col"><?= h('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($signups as $signup): ?>
            <tr>
                <td><?= $this->Number->format($signup->id) ?></td>
                <td><?= $signup->has('show') ? $this->Html->link($signup->show->id, ['controller' => 'Shows', 'action' => 'view', $signup->show->id]) : '' ?></td>
                <td><?= $signup->has('user') ? $this->Html->link($signup->show->id, ['controller' => 'Users', 'action' => 'view', $signup->user->id]) : '' ?></td>
                <td><?= h($signup->created) ?></td>
                <td><?= h($signup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $signup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $signup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $signup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signup->id)]) ?>
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
