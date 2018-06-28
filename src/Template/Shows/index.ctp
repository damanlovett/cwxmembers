<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><?= __('Shows') ?></h3>
    <table class="basicTable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dropdown_id','Show') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id','Date') ?></th>
                <th style="text-align: center;" scope="col"><?= $this->Paginator->sort('signups_open','Sign-ups Open') ?></th>
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
                <td style="text-align: center;"><?= $show->signups_open ? "<i class='fas fa-circle text-success'></i>" : '' ?></td>
                <td class="actions">
                    <i class="fas fa-calendar-alt"></i>
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
