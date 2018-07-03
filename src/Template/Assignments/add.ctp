<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<div class="assignments form large-9 medium-8 columns content">
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <legend><?= __('Add Assignment') ?></legend>
        <?php
            echo $this->Form->hidden('show_id', ['value' => $show->id]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('role_id', ['label' => 'Primary Assignment', 'empty' => '---']);
            echo $this->Form->control('role2_id', ['label' => 'Secondary Assignment', 'options' => $roles, 'empty' => '---']);
            echo $this->Form->control('callout');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
    <div class="related">
        <h4><?= __('Show Signups') ?>
        </h4>
        <?php if (!empty($signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($signups as $signups): ?>
            <tr>
                <td><?= h($signups->id) ?></td>
                <td><?= h($signups->month_id) ?></td>
                <td><?= h($signups->show_id) ?></td>
                <td><?= h($signups->user['first_name']." ".$signups->user['last_name']) ?></td>
                <td><?= h($signups->created) ?></td>
                <td><?php echo $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignment->id]) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Month Signups') ?>
        </h4>
        <?php if (!empty($signlist)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
            </tr>
            <?php foreach ($signlist as $signlist): ?>
            <tr>
                <td><?= h($signlist->show_id) ?></td>
                <td><?= h($signlist->user['display_name']) ?></td>
                <td><?= h($signlist->count) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
