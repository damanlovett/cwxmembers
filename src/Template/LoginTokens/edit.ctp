<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LoginToken $loginToken
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loginToken->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loginToken->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Login Tokens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loginTokens form large-9 medium-8 columns content">
    <?= $this->Form->create($loginToken) ?>
    <fieldset>
        <legend><?= __('Edit Login Token') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('token');
            echo $this->Form->control('duration');
            echo $this->Form->control('used');
            echo $this->Form->control('expires');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
