<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $show->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['controller' => 'Dropdowns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dropdown'), ['controller' => 'Dropdowns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shows form large-9 medium-8 columns content">
    <?= $this->Form->create($show) ?>
    <fieldset>
        <legend><?= __('Edit Show') ?></legend>
        <?php
            echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
            echo $this->Form->control('dropdown_id', ['options' => $dropdowns, 'empty' => true]);
            echo $this->Form->control('schedule', ['empty' => true]);
            echo $this->Form->control('notes');
            echo $this->Form->control('signups_open');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
