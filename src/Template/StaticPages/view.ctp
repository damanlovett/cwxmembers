<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StaticPage $staticPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Static Page'), ['action' => 'edit', $staticPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Static Page'), ['action' => 'delete', $staticPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Static Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Static Page'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staticPages view large-9 medium-8 columns content">
    <h3><?= h($staticPage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($staticPage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($staticPage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($staticPage->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Page Name') ?></h4>
        <?= $this->Text->autoParagraph(h($staticPage->page_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url Name') ?></h4>
        <?= $this->Text->autoParagraph(h($staticPage->url_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Page Content') ?></h4>
        <?= $this->Text->autoParagraph(h($staticPage->page_content)); ?>
    </div>
    <div class="row">
        <h4><?= __('Page Title') ?></h4>
        <?= $this->Text->autoParagraph(h($staticPage->page_title)); ?>
    </div>
</div>
