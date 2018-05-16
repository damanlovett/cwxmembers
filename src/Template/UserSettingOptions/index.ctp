<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSettingOption[]|\Cake\Collection\CollectionInterface $userSettingOptions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Settings'), ['controller' => 'UserSettings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Setting'), ['controller' => 'UserSettings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Setting Options'), ['controller' => 'SettingOptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setting Option'), ['controller' => 'SettingOptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSettingOptions index large-9 medium-8 columns content">
    <h3><?= __('User Setting Options') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_setting_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setting_option_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userSettingOptions as $userSettingOption): ?>
            <tr>
                <td><?= $this->Number->format($userSettingOption->id) ?></td>
                <td><?= $userSettingOption->has('user_setting') ? $this->Html->link($userSettingOption->user_setting->name, ['controller' => 'UserSettings', 'action' => 'view', $userSettingOption->user_setting->id]) : '' ?></td>
                <td><?= $userSettingOption->has('setting_option') ? $this->Html->link($userSettingOption->setting_option->title, ['controller' => 'SettingOptions', 'action' => 'view', $userSettingOption->setting_option->id]) : '' ?></td>
                <td><?= h($userSettingOption->created) ?></td>
                <td><?= h($userSettingOption->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSettingOption->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSettingOption->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSettingOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSettingOption->id)]) ?>
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
