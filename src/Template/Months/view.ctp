<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<?php $this->assign('title', $month->title);?>
<div class="months view large-12 medium-12 columns content">
<h3><i class="fas fa-calendar fa-1x fa-fw"></i>&nbsp;&nbsp;<?= $month->title." ".$month->year; ?>
    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Month']) ?></h3>


                                <div class=" alert alert-info" role="alert">
                                    text
                                    text
                                    text
                                </div>


<div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">&nbsp;</h1>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Shows</a></li>
                            <li><a href="#tab2" data-toggle="tab">Sign Ups</a></li>
                            <li><a href="#tab3" data-toggle="tab">Practices</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

        <?php if (!empty($month->shows)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th style="width:30px;"><?= __(' ') ?></th>
                <th style="width:30px;"><?= __(' ') ?></th>
                <th style="width:30px;"><?= __(' ') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
            </thead>
            <?php foreach ($month->shows as $shows): ?>
            <tr>
                <td>
                <?php if($shows->visible == 1) : ?> <?= $this->Html->link(__(''), ['controller'=>'Shows', 'action' => 'view', $shows->id], ['class'=>'fas fa-eye fa-xs fa-fw text-success iconSize', 'title'=>'View Show'])?>
                    <?php endif; ?>
                </td>
                <td>
                <?= $shows->signups_open ? $this->Html->link(__(''), ['controller'=>'Shows', 'action' => 'signup', $shows->id], ['class'=>'fas fa-pen-square fa-sm fa-fw text-success iconSize', 'title'=>'Sign Up']) : '' ?>
                </td>
                <td><?php if (!empty($shows->show_url)) : ?> <a href='<?= $shows->show_url ?>' class ="fab fa-chrome fa-sm fa-fw text-success iconSize" target="_blank" title='Show URL'></a> <?php endif;?>



                </td>
                <td><?= h($shows->Dropdowns['name']) ?></td>
                <td><?= h($shows->DisplayName) ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="5">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>
        <?php if (empty($month->shows)) { echo "<div style='text-align: center; margin-top:25px; min-height:300px'>Currently, there are no shows for sign ups or viewing.  Please check back later.</div>"; } ?>

                        </div>
                        <div class="tab-pane" id="tab2">

<?php if (!empty($signups)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Show') ?></th>
                <th scope="col"><?= __('Player')?></th>
                <th scope="col"><?= __('Show Date') ?></th>
            </thead>
            <?php foreach ($signups as $signups): ?>
            <tr>
                <td><?= h($signups->show->dropdown['name']) ?></td>
                <td><?= h($signups->user->fullName) ?></td>
                <td><?= h($signups->show->DisplayName) ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="3">    <div class="paginator">
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
        <?php endif; ?>


                        </div>                        <div class="tab-pane" id="tab3">

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
                <td><i class="fas fa-chalkboard-teacher fa-lg fa-fw text-primary"></i>&nbsp;&nbsp;&nbsp;<?= h($practices->leader) ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="3">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>
        <?php if (empty($month->practices)) { echo "<div style='text-align: center; margin-top:25px; min-height:300px'>Currently, there are no practices scheduled for this month.  Please check back later.</div>"; } ?>


                        </div>
                    </div>
                </div>
            </div>

</div>
