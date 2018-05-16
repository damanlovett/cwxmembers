<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting[]|\Cake\Collection\CollectionInterface $userSettings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Setting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['controller' => 'UserSettingOptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['controller' => 'UserSettingOptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSettings index large-9 medium-8 columns content">
    <h3><?= __('User Settings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userSettings as $userSetting): ?>
            <tr>
                <td><?= $this->Number->format($userSetting->id) ?></td>
                <td><?= h($userSetting->name) ?></td>
                <td><?= h($userSetting->display_name) ?></td>
                <td><?= h($userSetting->type) ?></td>
                <td><?= h($userSetting->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSetting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSetting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSetting->id)]) ?>
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
