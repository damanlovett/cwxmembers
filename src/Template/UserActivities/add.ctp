<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserActivity $userActivity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userActivities form large-9 medium-8 columns content">
    <?= $this->Form->create($userActivity) ?>
    <fieldset>
        <legend><?= __('Add User Activity') ?></legend>
        <?php
            echo $this->Form->control('useragent');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('last_action');
            echo $this->Form->control('last_url');
            echo $this->Form->control('user_browser');
            echo $this->Form->control('ip_address');
            echo $this->Form->control('logout');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
