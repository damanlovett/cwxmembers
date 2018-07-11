<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('Show Manager') ?>
    <?= $this->Html->link(__('New Show'), ['action' => 'add'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'New Show']) ?>

    </h3>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dropdown_id','Show') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id','Date') ?></th>
                <th style="text-align: center" scope="col"><?= $this->Paginator->sort('signups_open','Sign-ups Open') ?></th>
                <th style="text-align: center" scope="col"><?= $this->Paginator->sort('visible','Visible') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0 ?>
            <?php foreach ($shows as $show): ?>
                <?php $i++ ?>
            <tr>
                <td><?= $i.". ".$show->dropdown->name ?></td>
                <td><?= $show->schedule->format('M. j, Y g:i a') ?></td>
                <td style="text-align: center;"><?= $show->signups_open ? "<i class='fas fa-circle text-success fa-sm'></i>" : '' ?></td>
                <td style="text-align: center;"><?= $show->visible ? "<i class='fas fa-circle text-success fa-sm'></i>" : '' ?></td>
                <td class="actions">

                        <?= $this->Html->link(__(''), ['action' => 'mview', $show->id], ['class'=>'fas fa-edit fa-lg  fa-fw text-primary', 'title'=>'View / Assign Show']) ?>
                        <?= $this->Html->link(__(''), ['controller' => 'Months', 'action' => 'view', $show->month->id], ['class'=>'fas fa-calendar-alt fa-lg  fa-fw text-primary', 'title'=>'View Month']) ?></li>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $show->id], ['class'=>'fas fa-calendar fa-lg  fa-fw text-primary', 'title'=>'Edit Show']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'remove', $show->id], ['class'=>'fas fa-times fa-lg  fa-fw text-danger', 'title'=>'Delete Show']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <td colspan="5">    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</td>
            </tfoot>
    </table>
</div>
