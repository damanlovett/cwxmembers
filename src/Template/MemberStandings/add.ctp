<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberStanding $memberStanding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Member Standings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberStandings form large-9 medium-8 columns content">
    <?= $this->Form->create($memberStanding) ?>
    <fieldset>
        <legend><?= __('Add Member Standing') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
