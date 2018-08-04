<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $practice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $practice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Practices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="practices form large-9 medium-8 columns content">
    <?= $this->Form->create($practice) ?>
    <fieldset>
        <legend><?= __('Edit Practice') ?></legend>
        <?php
            echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
            echo $this->Form->control('schedule', ['empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('leader');
            echo $this->Form->control('visible');
            echo $this->Form->control('open');
            echo "<hr />";
        if(strtoupper(DEFAULT_HTML_EDITOR) == 'TINYMCE') {
                    echo $this->Tinymce->textarea('description', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en'], 'umcode');
                } else if(strtoupper(DEFAULT_HTML_EDITOR) == 'CKEDITOR') {
                    echo $this->Ckeditor->textarea('description', ['type'=>'textarea', 'label'=>false, 'div'=>false, 'style'=>'height:400px', 'class'=>'form-control'], ['language'=>'en', 'uiColor'=>'#14B8C4'], 'full');
                }
                 ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
