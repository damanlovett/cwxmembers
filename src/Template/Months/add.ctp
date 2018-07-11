<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar-alt fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('New Month') ?>
    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Manager']) ?></h3>

    <?= $this->Form->create($month) ?>
    <fieldset>

            <div class="row">
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('title', ['type' => 'select', 'options' => $this->Switches->selectMonth()]);?>
        </div>
            </div>
            </div>

            <div class="row">
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('year', ['type' => 'select', 'options' => $this->Switches->selectYear()]);?>
        </div>
            </div>
            </div>

            <div class="row">
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('first_friday', ['type'=>'text', 'placeholder'=>'Day of Show', 'label'=>false, 'div'=>false, 'size' => 3, 'class'=>'form-control datepicker']); ?>
        </div>
            </div>
            </div>

    <?= $this->Form->button(__('Add Month'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
        </fieldset>

</div>
