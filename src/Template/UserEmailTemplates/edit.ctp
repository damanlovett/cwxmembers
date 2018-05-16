<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailTemplate $userEmailTemplate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userEmailTemplate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailTemplate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Email Templates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmailTemplates form large-9 medium-8 columns content">
    <?= $this->Form->create($userEmailTemplate) ?>
    <fieldset>
        <legend><?= __('Edit User Email Template') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('template_name');
            echo $this->Form->control('header');
            echo $this->Form->control('footer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
