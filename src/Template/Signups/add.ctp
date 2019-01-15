<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Signup $signup
 */
?>
<div class="shows add large-12 medium-11 columns content">
    <?= $this->Form->create($signup) ?>
    <fieldset>
        <legend><?= __('Signup Player') ?></legend>
		<div class="um-form-row form-group ">
        <div class="col-sm-4">
        <?= $this->Form->control('user_id', ['label' => 'Player', 'options' => $users, 'empty' => true]); ?>
        </div>
        <hr/>
        </div>
        <div class="um-form-row form-group ">
        <div class="col-sm-4">
        <?= $this->Form->control('show_id', ['options' => $shows, 'empty' => true]); ?>
        </div>
        </div>
        <div class="um-form-row form-group ">
        <div class="col-sm-4">
        <?= $this->Form->control('month_id', ['options' => $months, 'empty' => true]); ?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Add Player')) ?>
    <?= $this->Form->end() ?>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= h('Show') ?></th>
                <th scope="col"><?= h('Player') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($signups as $signup) : ?>
            <tr>
            <td><?= $signup->has('show') ? $signup->show->schedule->format('M. j, Y g:i a') . "&nbsp;(<strong>" . $signup->show->schedule->format('D') . "</strong>)" : '' ?></td>
                <td><?= $signup->has('user') ? $signup->user->last_name . "," . $signup->user->first_name : '' ?></td>
                <td><?= h($signup->created) ?></td> 
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $signup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $signup->id], ['confirm' => __('Are you sure you want to delete this sign up?', $signup->id)]) ?>
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
