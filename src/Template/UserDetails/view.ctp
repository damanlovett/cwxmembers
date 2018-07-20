<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail $userDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Detail'), ['action' => 'edit', $userDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Detail'), ['action' => 'delete', $userDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Member Standings'), ['controller' => 'MemberStandings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member Standing'), ['controller' => 'MemberStandings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userDetails view large-9 medium-8 columns content">
    <h3><?= h($userDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userDetail->has('user') ? $this->Html->link($userDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nickname') ?></th>
            <td><?= h($userDetail->nickname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jersey') ?></th>
            <td><?= h($userDetail->jersey) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete') ?></th>
            <td><?= h($userDetail->delete) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Member Standing') ?></th>
            <td><?= $userDetail->has('member_standing') ? $userDetail->member_standing->title : 'n/a' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($userDetail->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellphone') ?></th>
            <td><?= h($userDetail->cellphone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referee') ?></th>
            <td><?= $this->Number->format($userDetail->referee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Host') ?></th>
            <td><?= $this->Number->format($userDetail->host) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voice') ?></th>
            <td><?= $this->Number->format($userDetail->voice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abc') ?></th>
            <td><?= (!empty($userDetail->abc)) ? $this->Switches->date($userDetail->abc) : "Needs Updating"?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Harassment Policy') ?></th>
            <td><?= (!empty($userDetail->harassment)) ? $this->Switches->date($userDetail->harassment) : "Needs Updating"?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Starting Year') ?></th>
            <td><?= h($userDetail->starting_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userDetail->modified) ?></td>
        </tr>
    </table>
</div>
