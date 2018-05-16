<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail[]|\Cake\Collection\CollectionInterface $userDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Member Standings'), ['controller' => 'MemberStandings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member Standing'), ['controller' => 'MemberStandings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userDetails index large-9 medium-8 columns content">
    <h3><?= __('User Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nickname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jersey') ?></th>
                <th scope="col"><?= $this->Paginator->sort('starting_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('referee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('host') ?></th>
                <th scope="col"><?= $this->Paginator->sort('voice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_standing_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellphone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userDetails as $userDetail): ?>
            <tr>
                <td><?= $this->Number->format($userDetail->id) ?></td>
                <td><?= $userDetail->has('user') ? $this->Html->link($userDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?></td>
                <td><?= h($userDetail->nickname) ?></td>
                <td><?= h($userDetail->jersey) ?></td>
                <td><?= h($userDetail->starting_year) ?></td>
                <td><?= $this->Number->format($userDetail->referee) ?></td>
                <td><?= $this->Number->format($userDetail->host) ?></td>
                <td><?= $this->Number->format($userDetail->voice) ?></td>
                <td><?= h($userDetail->delete) ?></td>
                <td><?= $userDetail->has('member_standing') ? $this->Html->link($userDetail->member_standing->title, ['controller' => 'MemberStandings', 'action' => 'view', $userDetail->member_standing->id]) : '' ?></td>
                <td><?= $this->Number->format($userDetail->abc) ?></td>
                <td><?= h($userDetail->location) ?></td>
                <td><?= h($userDetail->cellphone) ?></td>
                <td><?= h($userDetail->created) ?></td>
                <td><?= h($userDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id)]) ?>
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
