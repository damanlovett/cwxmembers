<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserContact $userContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userContacts form large-9 medium-8 columns content">
    <?= $this->Form->create($userContact) ?>
    <fieldset>
        <legend><?= __('Add User Contact') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('requirement');
            echo $this->Form->control('reply_message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
