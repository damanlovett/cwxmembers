<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserEmailSignature $userEmailSignature
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Email Signatures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userEmailSignatures form large-9 medium-8 columns content">
    <?= $this->Form->create($userEmailSignature) ?>
    <fieldset>
        <legend><?= __('Add User Email Signature') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('signature_name');
            echo $this->Form->control('signature');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
