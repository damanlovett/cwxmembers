<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Show'), ['action' => 'edit', $show->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Show'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Show'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['controller' => 'Dropdowns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dropdown'), ['controller' => 'Dropdowns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shows view large-9 medium-8 columns content">
    <h3><?= h($show->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $show->has('month') ? $this->Html->link($show->month->title, ['controller' => 'Months', 'action' => 'view', $show->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dropdown') ?></th>
            <td><?= $show->has('dropdown') ? $this->Html->link($show->dropdown->name, ['controller' => 'Dropdowns', 'action' => 'view', $show->dropdown->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($show->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signups Open') ?></th>
            <td><?= $this->Switches->onOff($show->signups_open) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= h($show->schedule) ?></td>
        </tr>
    </table>
    <div class="row">
        <?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add', $show->id, 'month'=>$show->month_id]) ?>

    </div>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($show->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($inshows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Role2 Id') ?></th>
                <th scope="col"><?= __('Callout') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inshows as $inshows): ?>
            <tr>
                <td><?= h($inshows->show_id) ?></td>
                <td><?= h($inshows->user->first_name." ".$inshows->user->last_name) ?></td>
                <td><?= h($inshows->role->name) ?></td>
                <td><?= h($inshows->roles2->name) ?></td>
                <td><?= h($inshows->callout) ?></td>
                <td><?= h($inshows->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $inshows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $inshows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $inshows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inshows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
        <div class="related">
        <h4><?= __('Call Outs') ?></h4>
        <?php if (!empty($callouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($callouts as $callouts): ?>
            <tr>
                <td><?= h($callouts->user->first_name." ".$callouts->user->last_name) ?></td>
                <td><?= h($callouts->role->name) ?> / <?= h($callouts->roles2->name) ?></td>
                <td><?= h($callouts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $callouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $callouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $callouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Signups') ?></h4>
        <?php if (!empty($show->signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($show->signups as $signups): ?>
            <tr>
                <td><?= h($signups->show_id) ?></td>
                <td><?= h($signups->Users['first_name']." ".$signups->Users['last_name']) ?></td>
                <td><?= h($signups->notes) ?></td>
                <td><?= h($signups->created) ?></td>
                <td><?= h($signups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Signups', 'action' => 'view', $signups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Signups', 'action' => 'edit', $signups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Signups', 'action' => 'delete', $signups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>






</div>
