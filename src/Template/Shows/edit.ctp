<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1 fa-fw"></i>&nbsp;&nbsp;
        <?= __('Edit Show') ?>
        <?= $this->Html->link(__('Back'), ['action' => 'manager'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'Back to Manager']) ?>

    </h3>
    <?= $this->Form->create($show) ?>
    <fieldset>
        <div class="col-md-12">
            <div class="um-form-row form-group ">
                <div class="col-sm-4">
                    <?php echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]); ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="um-form-row form-group ">
                <div class="col-sm-4">
                    <?php echo $this->Form->control('dropdown_id', ['label' => 'Show Type', 'options' => $dropdowns, 'empty' => true]); ?>
                </div>
            </div>
        </div>
        <hr />

        <div class="col-sm-8">
            <div class="um-form-row form-group">
                <p class="help-block">Last Date Entered:<strong class="text-success">
                        <?= $this->Switches->datetime($show->schedule); ?></strong>
                </p>
                <div class="col-md-4">

                    <?= $this->Form->control('schedule', ['type' => 'text', 'value' => '', 'label' => false, 'placeholder' => 'Confirm Day of Show', 'div' => false, 'class' => 'form-control datetimepicker']); ?>
                </div>
            </div>
        </div>
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
                <?php echo $this->Tinymce->textarea('notes', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:300px'], ['language' => 'en', 'uiColor' => '#14B8C4'], 'starndard'); ?>
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