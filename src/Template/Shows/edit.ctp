<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('Edit Show') ?>
    <?= $this->Html->link(__('Back'), ['action' => 'manager'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Manager']) ?>

    </h3>
    <?= $this->Form->create($show) ?>
    <fieldset>

        <div class="um-form-row form-group ">
            <div class="col-sm-8">

        <?php echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]); ?>
            </div>
        </div>
        <div class="um-form-row form-group ">
            <div class="col-sm-8">

        <?php   echo $this->Form->control('dropdown_id', ['label'=>'Show Type', 'options' => $dropdowns, 'empty' => true]);?>
            </div>
        </div>
       <?php /* <div class="col-sm-8" style="display:none;">
        <div class="um-form-row form-group ">
            <div class="col-sm-3">
                <?php echo $this->Form->input('schedule', ['type'=>'text', 'default'=>true,'label'=>false, 'div'=>false, 'class'=>'form-control datetimepicker']);?>
            </div>
        </div>
    </div> */?>
        <hr />
        <div class="um-form-row form-group">
            <div class="col-sm-3">
        <?php echo $this->Form->control('players_needed'); ?>
            </div>
        </div>
        <hr />
        <div class="um-form-row form-group">
            <div class="col-sm-3">
        <?php echo $this->Form->control('signups_open'); ?>
            </div>
        </div>
        <hr />
        <div class="um-form-row form-group">
            <div class="col-sm-3">
        <?php echo $this->Form->control('visible'); ?>
            </div>
        </div>
        <hr />
        <div class="um-form-row form-group">
            <div class="row">
                <div class="col-sm-4">
                    <?php echo $this->Form->control('ref_needed'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $this->Form->control('voice_needed'); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $this->Form->control('host_needed'); ?>
                </div>
            </div>
        </div>
        <hr />
        <div class="um-form-row form-group">
            <div class="col-sm-8">
        <?php echo $this->Tinymce->textarea('notes', ['type' => 'textarea',  'label' => false, 'div' => false, 'style'=>'height:300px'], ['language'=>'en', 'uiColor'=> '#14B8C4'], 'full');?>
            </div>
        </div>
        <div class="um-form-row form-group">
            <div class="col-sm-8">
        <?php echo $this->Form->control('show_url'); ?>
            </div>
        </div>
    </div>
        <div class="col-sm-8" style="margin-top:10px">
    <?= $this->Form->button(__('Edit Show'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
        </div>
        </fieldset>

</div>
