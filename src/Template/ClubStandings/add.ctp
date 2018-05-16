<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClubStanding $clubStanding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Club Standings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clubStandings form large-9 medium-8 columns content">
    <?= $this->Form->create($clubStanding) ?>
    <fieldset>
        <legend><?= __('Add Club Standing') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
