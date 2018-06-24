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
    <div class="pageTitle">
        <h3><?= h($practice->title) ?></h3>
        <h2><?= h($practice->schedule->format('l, F j, Y - g:i a')." :: ".$practice->leader) ?></h2>
    </div>
    <hr />
    <?= $this->Form->create($checkin) ?>
        <h3><?= __('Checkin') ?></h3>
        <?php
            echo $this->Form->hidden('practice_id', ['default' => $practice->id]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<hr />

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
    </div>        <?php endif; ?>

</div>
