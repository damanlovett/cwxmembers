<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StaticPage $staticPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Static Pages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="staticPages form large-9 medium-8 columns content">
    <?= $this->Form->create($staticPage) ?>
    <fieldset>
        <legend><?= __('Add Static Page') ?></legend>
        <?php
            echo $this->Form->control('page_name');
            echo $this->Form->control('url_name');
            echo $this->Form->control('page_content');
            echo $this->Form->control('page_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
