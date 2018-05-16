<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown $dropdown
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dropdown->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dropdowns form large-9 medium-8 columns content">
    <?= $this->Form->create($dropdown) ?>
    <fieldset>
        <legend><?= __('Edit Dropdown') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
