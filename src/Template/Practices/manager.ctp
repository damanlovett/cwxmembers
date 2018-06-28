<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice[]|\Cake\Collection\CollectionInterface $practices
 */
?>
<div style="min-height: 100px">
    &nbsp;
</div>
<div class="practices index large-12 medium-12 columns content">
    <h3><?= __('Practices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('month_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leader') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practices as $practice): ?>
            <tr>
                <td><?= $practice->has('month') ? $this->Html->link($practice->month->title, ['controller' => 'Months', 'action' => 'view', $practice->month->id]) : '' ?></td>
                <td><?= h($practice->schedule) ?></td>
                <td><?= h($practice->title) ?></td>
                <td><?= h($practice->leader) ?></td>
                <td class="actions">

                <?php if ($practice->open == 1) {
                    echo $this->Html->link(__('Checkin'), ['action' => 'checkin', $practice->id], ['class' => 'btn btn-primary']);
                                }else{
                    echo $this->Html->link(__('View'), ['action' => 'checkin', $practice->id], ['class' => 'btn btn-primary']);
                                                }?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
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
