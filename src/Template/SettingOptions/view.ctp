<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingOption $settingOption
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setting Option'), ['action' => 'edit', $settingOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setting Option'), ['action' => 'delete', $settingOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settingOption->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Setting Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setting Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['controller' => 'UserSettingOptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['controller' => 'UserSettingOptions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="settingOptions view large-9 medium-8 columns content">
    <h3><?= h($settingOption->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($settingOption->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($settingOption->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($settingOption->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($settingOption->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Setting Options') ?></h4>
        <?php if (!empty($settingOption->user_setting_options)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Setting Id') ?></th>
                <th scope="col"><?= __('Setting Option Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($settingOption->user_setting_options as $userSettingOptions): ?>
            <tr>
                <td><?= h($userSettingOptions->id) ?></td>
                <td><?= h($userSettingOptions->user_setting_id) ?></td>
                <td><?= h($userSettingOptions->setting_option_id) ?></td>
                <td><?= h($userSettingOptions->created) ?></td>
                <td><?= h($userSettingOptions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSettingOptions', 'action' => 'view', $userSettingOptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSettingOptions', 'action' => 'edit', $userSettingOptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSettingOptions', 'action' => 'delete', $userSettingOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSettingOptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
