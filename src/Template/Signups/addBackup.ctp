<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Signup $signup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Signups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="signups form large-9 medium-8 columns content">
    <?= $this->Form->create($signup) ?>
    <fieldset>
        <legend><?= __('Add Signup') ?></legend>
        <?php
        echo $this->Form->control('show_id', ['options' => $shows, 'empty' => true]);
        echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
        if (strtoupper(DEFAULT_HTML_EDITOR) == 'TINYMCE') {
            echo $this->Tinymce->textarea('notes', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:400px', 'class' => 'form-control'], ['language' => 'en'], 'umcode');
        } else if (strtoupper(DEFAULT_HTML_EDITOR) == 'CKEDITOR') {
            echo $this->Ckeditor->textarea('notes', ['type' => 'textarea', 'label' => false, 'div' => false, 'style' => 'height:400px', 'class' => 'form-control'], ['language' => 'en', 'uiColor' => '#14B8C4'], 'full');
        }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
