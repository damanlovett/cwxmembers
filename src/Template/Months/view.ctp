<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>

<div class="months view large-12 medium-12 columns content">

        <div class="pageTitle">
            <h3><?= $month->title." ".$month->year; ?></h3>
        </div>


<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">&nbsp;</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Practices</a></li>
                            <li><a href="#tab2" data-toggle="tab">Signups</a></li>
                            <li><a href="#tab3" data-toggle="tab">Shows</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

        <?php if (!empty($month->practices)): ?>
        <table class="basicTable" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Leader') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </thead>
            <?php foreach ($month->practices as $practices): ?>
            <tr>
                <td><?= h($practices->title) ?></td>
                <td><?= h($practices->schedule->format('D jS - g:i a')) ?></td>
                <td><?= h($practices->leader) ?></td>
                <td class="actions">

                    <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                   <li> <?= $this->Html->link(__('View'), ['controller' => 'Practices', 'action' => 'view', $practices->id]) ?></li>
                   <li>   <?= $this->Html->link(__('Edit'), ['controller' => 'Practices', 'action' => 'edit', $practices->id]) ?></li>
                   <li>   <?= $this->Form->postLink(__('Delete'), ['controller' => 'Practices', 'action' => 'delete', $practices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practices->id)]) ?></li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="4">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>

                        </div>
                        <div class="tab-pane" id="tab2">

        <?php if (!empty($signlist)): ?>
        <table class="basicTable table-hover table-striped" cellpadding="0" cellspacing="0">
                <?php $i = 0;?>

            <thead>
                <th scope="col"><?= __('Player & Signups') ?></th>
            </thead>
            <?php

            foreach ($signlist as $signlist): ?>
                <?php $i++;?>
            <tr>
                <td><?= h($i.". ".$signlist->user->fullName."  ( ".$signlist->count." )") ?></td>
                            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="1">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>


                        </div>
                        <div class="tab-pane" id="tab3">

        <?php if (!empty($month->shows)): ?>
        <table class="basicTable">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Signups Open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </thead>
            <?php foreach ($month->shows as $shows): ?>
            <tr>
                <td><?= h($shows->Dropdowns['name']) ?></td>
                <td><?= h($shows->schedule->format('D jS - g:i a')) ?></td>
                <td><?= h($this->Switches->OnOff($shows->signups_open)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shows', 'action' => 'view', $shows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shows', 'action' => 'edit', $shows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shows', 'action' => 'delete', $shows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="4">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>

</div>
