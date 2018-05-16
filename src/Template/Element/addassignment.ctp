

<div id="updateAssignmentsAdd">


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
            </tr>
            <?php foreach ($signups as $signups): ?>
            <tr>
                <td><?= h($signups->id) ?></td>
                <td><?= h($signups->month_id) ?></td>
                <td><?= h($signups->show_id) ?></td>
                <td><?= h($signups->user['first_name']." ".$signups->user['last_name']) ?></td>
                <td><?= h($signups->created) ?></td>
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
                <td><?= h($signlist->user['first_name']." ".$signups->user['last_name']) ?></td>
                <td><?= h($signlist->count) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>



</div>
