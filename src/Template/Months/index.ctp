<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month[]|\Cake\Collection\CollectionInterface $months
 */
?>
<div class="shows index large-12 medium-11 columns content panel panel-default">
    <div class="panel-body">
    <h3 class="panel-heading"><i class="fas fa-calendar-alt fa-2x fa-fw"></i><?= __('Months') ?></h3>

        <table  class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('first_friday', 'Month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($months as $month): ?>
            <tr>
                <td><?= h($month->title." ".$month->year) ?></td>
                <td><?= h($month->created->format('m/d/y - g:i a')) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__(''), ['action' => 'mview', $month->id], ['class'=>'fas fa-calendar-alt fa-lg fa-fw text-success', 'title'=>'View Month']) ?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $month->id], ['class'=>'fas fa-edit fa-lg fa-fw text-warning', 'title'=>'Edit Month']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $month->id], ['class'=>'fas fa-times-circle fa-lg fa-fw text-danger', 'title'=>'Delete Month']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
                    <tfoot>
                        <td colspan="3">

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

                        </td>
                    </tfoot>
    </table>
</div>
</div>
