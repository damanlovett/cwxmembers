<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail $userDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Member Standings'), ['controller' => 'MemberStandings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Member Standing'), ['controller' => 'MemberStandings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($userDetail) ?>
    <fieldset>
        <legend><?= __('Edit User Detail') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('nickname');
            echo $this->Form->control('jersey');
            echo $this->Form->control('starting_year', ['empty' => true]);
            echo $this->Form->control('referee');
            echo $this->Form->control('host');
            echo $this->Form->control('voice');
            echo $this->Form->control('delete');
            echo $this->Form->control('member_standing_id', ['options' => $memberStandings, 'empty' => true]);
            echo $this->Form->control('abc');
            echo $this->Form->control('location');
            echo $this->Form->control('cellphone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
