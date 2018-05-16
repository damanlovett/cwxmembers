<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin $checkin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Checkins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Practices'), ['controller' => 'Practices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Practice'), ['controller' => 'Practices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="checkins form large-9 medium-8 columns content">
    <?= $this->Form->create($checkin) ?>
    <fieldset>
        <legend><?= __('Add Checkin') ?></legend>
        <?php
            echo $this->Form->control('practice_id', ['options' => $practices, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
