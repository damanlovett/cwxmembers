<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>

<div class="months view large-12 medium-12 columns content">
<h3><i class="fas fa-calendar-alt fa-2x fa-fw"></i><?= $month->title." ".$month->year; ?></h3>

<div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">&nbsp;</h1>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Shows</a></li>
                            <li><a href="#tab2" data-toggle="tab">Practices</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

        <?php if (!empty($month->shows)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th style="text-align: center" scope="col"><?= __('Signups Open') ?></th>
            </thead>
            <?php foreach ($month->shows as $shows): ?>
            <tr>
                <td><?= h($shows->Dropdowns['name']) ?></td>
                <td><?= h($shows->schedule->format('D jS - g:i a')) ?></td>
                <td style="text-align: center"><?= $shows->signups_open ? "<i class='fas fa-circle fa-sm fa-fw text-success'></i>" : '' ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="3">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>

                        </div>
                        <div class="tab-pane" id="tab2">

        <?php if (!empty($month->practices)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Leader') ?></th>
            </thead>
            <?php foreach ($month->practices as $practices): ?>
            <tr>
                <td><?= h($practices->title) ?></td>
                <td><?= h($practices->schedule->format('D jS - g:i a')) ?></td>
                <td><i class="fas fa-chalkboard-teacher fa-l fa-fw text-primary">&nbsp;&nbsp;</i><?= h($practices->leader) ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="3">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>

</div>
