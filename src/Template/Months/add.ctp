<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Months'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Practices'), ['controller' => 'Practices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Practice'), ['controller' => 'Practices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="months form large-9 medium-8 columns content">
    <?= $this->Form->create($month) ?>
    <fieldset>
        <legend><?= __('Add Month') ?></legend>
        <?php
            echo $this->Form->control('title', ['type' => 'select', 'options' => $this->Switches->selectMonth()]);
            echo $this->Form->control('year', ['type' => 'select', 'options' => $this->Switches->selectYear()]);
            echo $this->Form->control('first_friday');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
