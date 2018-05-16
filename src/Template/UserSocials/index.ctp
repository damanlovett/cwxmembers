<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSocial[]|\Cake\Collection\CollectionInterface $userSocials
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Social'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSocials index large-9 medium-8 columns content">
    <h3><?= __('User Socials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('socialid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userSocials as $userSocial): ?>
            <tr>
                <td><?= $this->Number->format($userSocial->id) ?></td>
                <td><?= $userSocial->has('user') ? $this->Html->link($userSocial->user->id, ['controller' => 'Users', 'action' => 'view', $userSocial->user->id]) : '' ?></td>
                <td><?= h($userSocial->type) ?></td>
                <td><?= h($userSocial->socialid) ?></td>
                <td><?= h($userSocial->created) ?></td>
                <td><?= h($userSocial->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSocial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSocial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSocial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocial->id)]) ?>
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
