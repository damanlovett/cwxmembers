<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberStanding[]|\Cake\Collection\CollectionInterface $memberStandings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Member Standing'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberStandings index large-9 medium-8 columns content">
    <h3><?= __('Member Standings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberStandings as $memberStanding): ?>
            <tr>
                <td><?= $this->Number->format($memberStanding->id) ?></td>
                <td><?= h($memberStanding->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $memberStanding->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $memberStanding->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $memberStanding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberStanding->id)]) ?>
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
