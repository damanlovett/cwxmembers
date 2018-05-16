<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SettingOption $settingOption
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Setting Options'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Setting Options'), ['controller' => 'UserSettingOptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Setting Option'), ['controller' => 'UserSettingOptions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="settingOptions form large-9 medium-8 columns content">
    <?= $this->Form->create($settingOption) ?>
    <fieldset>
        <legend><?= __('Add Setting Option') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
