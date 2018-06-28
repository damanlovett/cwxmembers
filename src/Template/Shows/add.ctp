<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Show') ?></legend>
        <?php
            echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
            echo $this->Form->control('dropdown_id', ['options' => $dropdowns, 'empty' => true]);
        ?>

        <div class="um-form-row form-group ">
            <div class="col-sm-3">
                <?php echo $this->Form->control('schedule', ['type'=>'text', 'placeholder'=>'Day of Show', 'label'=>false, 'div'=>false, 'size' => 3, 'class'=>'form-control datetimepicker']); ?>
            </div>
        </div>
        <div class="um-form-row form-group">
            <div class="col-sm-3">
        <?php echo $this->Form->control('signups_open'); ?>
            </div>
        </div>
        <div class="um-form-row form-group">
            <div class="col-sm-3">
        <?php echo $this->Form->control('notes'); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<?php //echo $this->Form->input('Users.bday', ['type'=>'text', 'div'=>false, 'class'=>'form-control datetimepicker']); ?>
