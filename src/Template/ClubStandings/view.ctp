<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClubStanding $clubStanding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Club Standing'), ['action' => 'edit', $clubStanding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Club Standing'), ['action' => 'delete', $clubStanding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clubStanding->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Club Standings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club Standing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clubStandings view large-9 medium-8 columns content">
    <h3><?= h($clubStanding->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($clubStanding->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clubStanding->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($clubStanding->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($clubStanding->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Bday') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Club Standing Id') ?></th>
                <th scope="col"><?= __('Email Verified') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clubStanding->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->user_group_id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->bday) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->club_standing_id) ?></td>
                <td><?= h($users->email_verified) ?></td>
                <td><?= h($users->last_login) ?></td>
                <td><?= h($users->ip_address) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->created_by) ?></td>
                <td><?= h($users->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
