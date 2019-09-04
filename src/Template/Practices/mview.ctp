<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="practices view large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-chalkboard fa-1x fa-fw"></i>&nbsp;&nbsp;
        <?= h($practice->title) ?>
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
            <?= $this->Html->link(__('Back'), ['controller' => 'practices', 'action' => 'manager', 'plugin' => false], ['class' => 'btn btn-default btn-sm']); ?>
        </div>
    </h3>
    <h2>
        <?= h($practice->schedule->format('l, F j, Y - g:i a')) ?>
    </h2>
    <h3>
        <i class='fas fa-chalkboard-teacher'></i> &nbsp;&nbsp;
        <?= h($practice->leader) ?>
    </h3>
    <hr />
    <?= $practice->description; ?>
    <hr />
    <?php if ($practice->open == 1) {

        echo "<div class='alert alert-danger' role='alert'> Players are able to check into practice</div>";
    } else {


        echo "<div class='alert alert-danger' role='alert'> Check-in for practice has been closed.</div>";
    };
    ?>

    <hr />

    <div class="related">
        <h4>
            <?= __('Attendance') ?>
        </h4>
        <?php if (!empty($checkins)) : ?>
        <?php $i = 0; ?>
        <table class="basicTable" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col">
                    <?= __('Player') ?>
                </th>
                <th scope="col">
                    <?= __('Date and Time') ?>
                </th>
            </thead>
            <?php foreach ($checkins as $checkins) : ?>

            <?php if (!empty($checkins->user->DisplayName)) : ?>
            <?php $i++ ?>
            <tr>
                <td>
                    <?= $i . ")&nbsp;&nbsp;" . $checkins->user->DisplayName; ?>

                </td>
                <td>
                    <?= h($checkins->created) ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="2">&nbsp;</td>
            </tfoot>
        </table>
    </div>
    <?php endif; ?>
</div>