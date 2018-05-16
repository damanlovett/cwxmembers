<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin $checkin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Checkin'), ['action' => 'edit', $checkin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Checkin'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Checkins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Checkin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Practices'), ['controller' => 'Practices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Practice'), ['controller' => 'Practices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="checkins view large-9 medium-8 columns content">
    <h3><?= h($checkin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Practice') ?></th>
            <td><?= $checkin->has('practice') ? $this->Html->link($checkin->practice->title, ['controller' => 'Practices', 'action' => 'view', $checkin->practice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $checkin->has('user') ? $this->Html->link($checkin->user->id, ['controller' => 'Users', 'action' => 'view', $checkin->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($checkin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($checkin->created) ?></td>
        </tr>
    </table>
</div>
