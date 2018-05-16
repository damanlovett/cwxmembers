<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Club Standings'), ['controller' => 'ClubStandings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club Standing'), ['controller' => 'ClubStandings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Login Tokens'), ['controller' => 'LoginTokens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Login Token'), ['controller' => 'LoginTokens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Activities'), ['controller' => 'UserActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Activity'), ['controller' => 'UserActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Contacts'), ['controller' => 'UserContacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Contact'), ['controller' => 'UserContacts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['controller' => 'UserEmailRecipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['controller' => 'UserEmailRecipients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Email Signatures'), ['controller' => 'UserEmailSignatures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email Signature'), ['controller' => 'UserEmailSignatures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Email Templates'), ['controller' => 'UserEmailTemplates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Email Template'), ['controller' => 'UserEmailTemplates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Socials'), ['controller' => 'UserSocials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Social'), ['controller' => 'UserSocials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('user_group_id', ['options' => $userGroups, 'empty' => true]);
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('gender');
            echo $this->Form->control('photo');
            echo $this->Form->control('bday', ['empty' => true]);
            echo $this->Form->control('active');
            echo $this->Form->control('club_standing_id', ['options' => $clubStandings, 'empty' => true]);
            echo $this->Form->control('email_verified');
            echo $this->Form->control('last_login', ['empty' => true]);
            echo $this->Form->control('ip_address');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
