<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-chalkboard fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('New Practice') ?>
    <?= $this->Html->link(__('Back'), ['action' => 'manager'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Manager']) ?>

    </h3>
    <?= $this->Form->create($practice) ?>
    <fieldset>
        <legend><?= __('Add Practice') ?></legend>
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
        <?= $this->Form->control('month_id', ['options' => $months, 'empty' => true]);?>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-3">
            <?= $this->Form->control('schedule', ['type'=>'text', 'label'=>'Date','placeholder'=>'Day Of Practice', 'div'=>false, 'class'=>'form-control datetimepicker']); ?>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('title'); ?>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('leader'); ?>
                </div>
            </div>
                        <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-3">
            <?= $this->Form->control('visible'); ?>
                </div>
            </div>
                        <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-3">
            <?= $this->Form->control('open'); ?>
                </div>
            </div>
                        <div style="clear: both;"></div>
            <div class="um-form-row form-group ">
            <div class="col-sm-6">
            <?= $this->Form->control('description'); ?>
                </div>
            </div>

    </fieldset>
    <?= $this->Form->button(__('Add Practice'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
