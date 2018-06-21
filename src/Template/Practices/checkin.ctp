<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Practice'), ['action' => 'edit', $practice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Practice'), ['action' => 'delete', $practice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Practices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Practice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="practices view large-9 medium-8 columns content">
    <h3><?= h($practice->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $practice->has('month') ? $this->Html->link($practice->month->title, ['controller' => 'Months', 'action' => 'view', $practice->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($practice->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leader') ?></th>
            <td><?= h($practice->leader) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($practice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= h($practice->schedule) ?></td>
        </tr>
    </table>


<div class="checkins form large-9 medium-8 columns content">
    <?= $this->Form->create($checkin) ?>
    <fieldset>
        <legend><?= __('Add Checkin') ?></legend>
        <?php
            echo $this->Form->hidden('practice_id', ['default' => $practice->id]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


   <div class="related">
        <h4><?= __('Related Checkins') ?></h4>
        <?php if (!empty($checkins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Player') ?></th>
                <th scope="col"><?= __('Checkin') ?></th>
                <th scope="col"><?= __('Checkin') ?></th>
            </tr>
            <?php foreach ($checkins as $checkins): ?>
            <tr>
                <td><?= h($checkins->user->fullName); ?></td>
                <td><?= h($checkins->created) ?></td>
                <td><?= h($checkins->practice_id) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
