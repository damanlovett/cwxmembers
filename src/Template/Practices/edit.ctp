<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="practices index large-12 medium-11 columns content">
    <h3><i class="fas fa-chalkboard fa-1 fa-fw"></i>&nbsp;&nbsp;
        <?= __('Edit Practice') ?>

    <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
        <?= $this->Html->link(__('Back'), ['action' => 'manager'], ['class' => 'btn btn-default btn sm', ' title' => 'back to Manager']) ?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $practice->id], ['confirm' => __('Are you sure you want to delete this practice? This action can not be undone.', $practice->id), 'class' => 'btn btn-default btn sm']) ?>
        </div>
        </h3>

    <div class="row">

        <?= $this->Form->create($practice) ?>
        <fieldset>
            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-md-4">
                        <?php echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]); ?>
                    </div>
                </div>
            </div>
            <hr />
            <div class="col-md-8">
                <div class="um-form-row form-group">
                    <p class="help-block">Last Date Entered:
                        <strong class="text-success">
                            <?= $this->Switches->datetime($practice->schedule); ?></strong>
                    </p>
                    <div class="col-md-4">
                        <?= $this->Form->control('schedule', ['type' => 'text', 'value' => '', 'label' => false, 'placeholder' => 'Confirm Day of Practice', 'div' => false, 'class' => 'form-control datetimepicker']); ?>
                    </div>
                </div>
            </div>
            <hr />

            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-md-4">
                        <?= $this->Form->control('title'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-md-4">
                        <?= $this->Form->control('leader'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-md-4">
                        <?= $this->Form->control('visible'); ?>
                        <?= $this->Form->control('open'); ?>
                    </div>
                </div>
            </div>
            <?= "<hr />"; ?>
            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-md-12">
                        <?php if (strtoupper(DEFAULT_HTML_EDITOR) == 'TINYMCE') {
                            echo $this->Tinymce->textarea('description', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:400px', 'class' => 'form-control'], ['language' => 'en'], 'umcode');
                        } else if (strtoupper(DEFAULT_HTML_EDITOR) == 'CKEDITOR') {
                            echo $this->Ckeditor->textarea('description', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:400px', 'class' => 'form-control'], ['language' => 'en', 'uiColor' => '#cccccc'], 'standard');
                        } ?>
                    </div>
                </div>
            </div>
            <br />
            <hr />
            <div class="col-md-12">
                <div class="um-form-row form-group">
                    <div class="col-sm-8">
                        <?= $this->Form->button(__('Edit Practice'), ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>