<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="practices form large-12 medium-12 columns content">
    <?= $this->Form->create($practice) ?>
    <fieldset>
        <legend><?= __('Add Practice') ?></legend>
        <?php
            echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
            echo $this->Form->control('schedule', ['empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('leader');
            echo $this->Form->control('visible');
            echo $this->Form->control('open');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
