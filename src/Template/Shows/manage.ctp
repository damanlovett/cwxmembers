<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Show'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dropdowns'), ['controller' => 'Dropdowns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dropdown'), ['controller' => 'Dropdowns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shows index large-9 medium-8 columns content">
    <h3><?= __('Shows') ?></h3>
    <table class="basicTable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dropdown_id','Show') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id','Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signups_open','Sign-ups Open') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0 ?>
            <?php foreach ($shows as $show): ?>
                <?php $i++ ?>
            <tr>
                <td><?= $i.". ".$show->dropdown->name ?></td>
                <td><?= $show->month->title." ".$show->schedule->format('d,Y g:i a') ?></td>
                <td><?= $show->signups_open ? 'Yes' : 'No' ?></td>
                <td class="actions">
                    <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link(__('View Show'), ['action' => 'view', $show->id]) ?></li>
                        <li><?= $this->Html->link(__('View Month'), ['controller' => 'Months', 'action' => 'view', $show->month->id]) ?></li>
                        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?></li>
                        <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?></li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <td colspan="4">&nbsp;</td>
            </tfoot>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
