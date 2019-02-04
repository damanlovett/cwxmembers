<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin[]|\Cake\Collection\CollectionInterface $checkins
 */
?>

<div class="checkins index large-9 medium-8 columns content">
    <h3><i class="fas fa-clipboard-check fa-2x fa-fw"></i><?= __('Checkins') ?></h3>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('practice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($checkins as $checkin) : ?>
            <tr>
                <td><?= $this->Number->format($checkin->id) ?></td>
                <td><?= $checkin->has('practice') ? $this->Html->link($checkin->practice->title, ['controller' => 'Practices', 'action' => 'view', $checkin->practice->id]) : '' ?></td>
                <td><?= $checkin->has('user') ? $this->Html->link($checkin->user->id, ['controller' => 'Users', 'action' => 'view', $checkin->user->id]) : '' ?></td>
                <td><?= h($checkin->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $checkin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $checkin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id)]) ?>
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
