<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<?php $this->assign('title', $month->title); ?>
<div class="months view large-12 medium-12 columns content">
    <h3>
        <i class="fas fa-calendar-alt fa-1x fa-fw"></i>&nbsp;&nbsp;
        <?= $month->title . " " . $month->year; ?>
        <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'Back to Month']) ?>
        </div>
    </h3>

    <?php foreach ($information as $information) : ?>

    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle fa-3x fa-fw fa-pull-left"></i>
        <?= $information->page_content ?>
        <div style="clear: both;"></div>
    </div>

    <?php endforeach; ?>

    <hr />
    <ul class="nav nav-pills">
        <li role="presentation" class="disabled"><a href="#"><strong>Icon Legend:</strong></a> &nbsp;&nbsp;</li>
        <li role="presentation" class="disabled"><a href="#"><i class="fas fa-eye fa-l  fa-fw text-success"></i> View
                and signup for show</a></li>
        <li role="presentation" class="disabled"><a href="#"><i class="fas fa-pen-alt fa-l fa-fw text-success"></i> One
                click show sign up</a></li>
        <li role="presentation" class="disabled"><a href="#">
                <?= $this->Html->image('ref.png', ['title' => 'need a ref or host']) ?> Need ref / host </a></li>
        <li role="presentation" class="disabled"><a href="#">
                <?= $this->Html->image('voice.png', ['title' => 'need a voice or DJ', 'class' => 'text-sucesss']) ?>
                Need voice / DJ</a></li>
    </ul>
    <div style="clear: both;"></div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title">&nbsp;</h1>
            <span class="pull-left">
                <!-- TODO this works Tabs -->
            </span>
        </div>
        <div class="panel-body">

            <div class="col-xs-6 col-md-6">

                <?php if (!empty($month->shows)) : ?>
                <table class="table table-hover table-striped table-bordered" cellpadding="0" cellspacing="0">
                    <thead>
                        <th class="iconBox">
                            <?= __('') ?>
                        </th>
                        <th scope="col">
                            <i class="fas fa-cog fa-l fa-fw"></i>&nbsp;
                            <?= __('Show') ?>
                        </th>

                    </thead>
                    <?php $previous = ''; ?>
                    <?php foreach ($month->shows as $shows) : ?>
                    <tr>
                        <td>
                            <?php if ($shows->signups_open == 1 && $shows->visible == 1) : ?>
                            <?= $this->Form->create(null, [
                                'url' => ['controller' => 'Months', 'action' => 'view', $month->id], ['class' => 'form-horizontal']
                            ]); ?>

                            <?php
                            echo $this->Form->hidden('show_id', ['value' => $shows->id]);
                            echo $this->Form->hidden('user_id', ['value' => $userId]);
                            echo $this->Form->hidden('month_id', ['value' => $shows->month_id]);
                            ?>
                            <a href="#" onclick="this.parentNode.submit();" title="Sign Up"><i
                                    class="fas fa-pen-alt fa-1x fa-fw text-success"></i></a>
                            <?= $this->Form->end() ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= $shows->Dropdowns['name'] . "<br/>&nbsp;<strong><span class='myBlue small'>(&nbsp;" . $shows->DisplayDay . "&nbsp;)</span></strong>" ?>

                            <?= h($shows->ShortName) ?>
                        </td>

                    </tr>
                    <?php $previous = $shows->Dropdowns['name'];
                    endforeach; ?>
                    <tfoot>
                        <td colspan="2">
                            <?php // echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Shows')]); ?>
                        </td>
                    </tfoot>
                </table>
                <?php endif; ?>
                <?php if (empty($month->shows)) {
                    echo "<div style='text-align: center; margin-top:25px; min-height:300px'>Currently, there are no shows for sign ups or viewing.  Please check back later.</div>";
                } ?>




            </div>
            <div class="col-xs-6 col-md-6">

                <?php if (!empty($signups)) : ?>
                <table class="table table-hover table-striped table-bordered" cellpadding="0" cellspacing="0">
                    <thead>
                        <th class="iconBox">
                            <?= __('') ?>
                        </th>
                        <th scope="col">
                            <i class="fas fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
                            <?= __('My Sign Ups') ?>
                        </th>

                    </thead>
                    <?php $previous2 = ''; ?>
                    <?php foreach ($signups as $signups) : ?>
                    <tr>



                        <td><?php if ($signups->show->signups_open == 0) : ?>
                            <?= $this->Form->postLink(__(''), ['controller' => 'signups', 'action' => 'remove', $signups->id], ['class' => 'fas fa-minus-square fa-l fa-fw text-dander', 'title' => 'Delete Signup']) ?>&nbsp;&nbsp;
                            <?php endif; ?>
                        </td>



                        <td>
                            <?= $signups->show->dropdown['name'] . "<br/>&nbsp;<strong><span class='myBlue small'>&nbsp;" . date_format($signups->show->schedule, "D") . "&nbsp;</span></strong>&nbsp;-&nbsp;" . $signups->show->ShortName ?>&nbsp;
                        </td>
                    </tr>
                    <?php 
                    $previous2 = $signups->show->DisplayName;
                    endforeach; ?>
                    <tfoot>
                        <td colspan="2">
                            <?php // echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Shows')]); ?>
                        </td>
                    </tfoot>
                </table>
                <?php endif; ?>


            </div>


        </div>
    </div>
</div>