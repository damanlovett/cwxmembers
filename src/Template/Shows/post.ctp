<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1 fa-fw"></i>&nbsp;&nbsp;
        <?= __('Post Show Assignments') ?>
        <?= $this->Html->link(__('Back'), ['action' => 'manager'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'Back to Manager']) ?>

    </h3>
    <?= $this->Form->create($show) ?>
    <fieldset>


        <div class="col-sm-8">

            <hr />
            <div class="um-form-row form-group">
                <div class="col-sm-8">
                    <?php echo $this->Tinymce->textarea('notes', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:500px;width:100%'], ['language' => 'en', 'uiColor' => '#14B8C4'], 'starndard'); ?>
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