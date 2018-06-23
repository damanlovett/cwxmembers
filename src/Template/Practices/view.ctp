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
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($practice->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Checkins') ?></h4>
        <?php $i = 0; ?>
        <?php if (!empty($practice->checkins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Member') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($practice->checkins as $checkins): ?>
                            <?php $i++;?>

            <tr>
                <td><?= h($i.". ".$checkins->Users['first_name']." ".$checkins->Users['last_name']) ?></td>
                <td><?= h($checkins->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Checkins', 'action' => 'view', $checkins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Checkins', 'action' => 'edit', $checkins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Checkins', 'action' => 'delete', $checkins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
