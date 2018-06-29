<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-2x fa-fw"></i><?= __('Shows') ?></h3>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('dropdown_id','Show') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id','Date') ?></th>
                <th style="text-align: center;" scope="col"><?= $this->Paginator->sort('signups_open','Sign-ups Open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0 ?>
            <?php foreach ($shows as $show): ?>
                <?php $i++ ?>
            <tr>
                <td><?= $i.". ".$show->dropdown->name ?></td>
                <td><?= $show->schedule->format('M. j, Y g:i a') ?></td>
                <td style="text-align: center;"><?= $show->signups_open ? "<i class='fas fa-circle fa-lg fa-fw text-success'></i>" : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'view', $show->id], ['class'=>'fas fa-calendar fa-lg fa-fw text-primary', 'title'=>'View Show']) ?>
                    <?= $this->Html->link(__(''), ['controller'=>'months','action' => 'view', $show->month_id], ['class'=>'fas fa-calendar-alt fa-lg fa-fw text-primary', 'title'=>'View Month']) ?>
                <?php if($show->signups_open == 1) : ?>
                    <?= $this->Html->link(__(''), ['action' => 'signup', $show->id], ['class'=>'fas fa-pen-alt fa-lg fa-fw text-primary', 'title'=>'Sign Up']) ?>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <td colspan="4"><?php if (empty($show)): ?><p class="text-md-center">Currently, there are no available shows</p><?php endif; ?>&nbsp;</td>
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
