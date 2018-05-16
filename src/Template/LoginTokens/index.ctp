<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginToken[]|\Cake\Collection\CollectionInterface $loginTokens
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Login Token'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginTokens index large-9 medium-8 columns content">
    <h3><?= __('Login Tokens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loginTokens as $loginToken): ?>
            <tr>
                <td><?= $this->Number->format($loginToken->id) ?></td>
                <td><?= $loginToken->has('user') ? $this->Html->link($loginToken->user->id, ['controller' => 'Users', 'action' => 'view', $loginToken->user->id]) : '' ?></td>
                <td><?= h($loginToken->token) ?></td>
                <td><?= h($loginToken->duration) ?></td>
                <td><?= h($loginToken->used) ?></td>
                <td><?= h($loginToken->expires) ?></td>
                <td><?= h($loginToken->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $loginToken->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loginToken->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loginToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginToken->id)]) ?>
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
