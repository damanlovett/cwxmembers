<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSettingOption $userSettingOption
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSettingOption->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSettingOption->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Settings'), ['controller' => 'UserSettings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Setting'), ['controller' => 'UserSettings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Setting Options'), ['controller' => 'SettingOptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setting Option'), ['controller' => 'SettingOptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSettingOptions form large-9 medium-8 columns content">
    <?= $this->Form->create($userSettingOption) ?>
    <fieldset>
        <legend><?= __('Edit User Setting Option') ?></legend>
        <?php
            echo $this->Form->control('user_setting_id', ['options' => $userSettings]);
            echo $this->Form->control('setting_option_id', ['options' => $settingOptions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
