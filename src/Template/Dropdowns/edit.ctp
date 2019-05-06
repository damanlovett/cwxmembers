<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown $dropdown
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="hideDiv">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete Show Type'),
                ['action' => 'delete', $dropdown->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dropdowns view large-9 medium-8 columns content">
    <h3><?= __('Edit Dropdown') ?>
        <?= $this->Form->postLink(
                __('Delete Show Type'),
                ['action' => 'delete', $dropdown->id],
                ['class' => 'btn btn-default btn-sm pull-right'],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dropdown->id)]
            )
        ?><?= $this->Html->link(__('Cancel Edit'), ['action' => 'manager'],['class'=>'btn btn-default btn-sm pull-right']) ?>
    </h3>

    <?= $this->Form->create($dropdown) ?>
    <fieldset>
        <?php $options = ['shows'=>'Shows','players'=>'Players','shirts'=>'Shirt Sizes'];?>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->select('type',$options);
            ?>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </fieldset>

</div>