<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting $userSetting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Settings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['controller' => 'UserSettingOptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['controller' => 'UserSettingOptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($userSetting) ?>
    <fieldset>
        <legend><?= __('Add User Setting') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('display_name');
            echo $this->Form->control('value');
            echo $this->Form->control('type');
            echo $this->Form->control('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
