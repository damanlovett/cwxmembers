<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDetail[]|\Cake\Collection\CollectionInterface $userDetails
 */
?>

<div class="userDetails index large-12 medium-11 columns content">
    <h3><?= __('User Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_standing_id', 'Standing') ?></th>
                <th scope="col"><?= $this->Paginator->sort('starting_year', 'Started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('referee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('host') ?></th>
                <th scope="col"><?= $this->Paginator->sort('voice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userDetails as $userDetail): ?>
            <tr>
                <td><?= $userDetail->has('user') ? $this->Html->link($userDetail->user->fullName, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?></td>
                <td><?= $userDetail->has('member_standing') ? $this->Html->link($userDetail->member_standing->title, ['controller' => 'MemberStandings', 'action' => 'view', $userDetail->member_standing->id]) : '' ?></td>
                <td><?= $userDetail->has('starting_year') ? $userDetail->starting_year->format('M Y') : '' ?> </td>
                <td><?= $userDetail->has('referee') ? "<i class='fas fa-check fa-sm -fa-fw text-success'></i>" : '' ?> </td>
                <td><?= $userDetail->has('host') ? "<i class='fas fa-check fa-sm -fa-fw text-success'></i>" : '' ?> </td>
                <td><?= $userDetail->has('voice') ? "<i class='fas fa-check fa-sm -fa-fw text-success'></i>" : '' ?> </td>
                <td><?= $userDetail->has('abc') ? "<i class='fas fa-check fa-sm -fa-fw text-success'></i>" : '' ?> </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetail->id)]) ?>
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
