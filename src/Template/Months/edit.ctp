<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar-alt fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('Edit Month') ?>
    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Manager']) ?>    <?= $this->Form->create($month) ?></h3>
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
            <?= $this->Form->control('first_friday', ['empty'=>true, 'label'=>'First Friday', 'div'=>false, 'size' => 3, 'class'=>'datepicker']); ?>
        </div>
            </div>
            </div>

    <?= $this->Form->button(__('Edit Month'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
        </fieldset>

</div>
