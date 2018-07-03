<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="months index large-12 medium-11 columns content">
    <?= $this->Form->create($month) ?>
    <fieldset>
        <legend><?= __('Edit Month') ?></legend>
        <?php
            echo $this->Form->control('title', ['type' => 'select', 'options' => $this->Switches->selectMonth()]);
            echo $this->Form->control('year', ['type' => 'select', 'options' => $this->Switches->selectYear()]);
            echo $this->Form->control('first_friday');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
