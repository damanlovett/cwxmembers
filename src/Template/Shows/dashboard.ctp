<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="months index large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;&nbsp;
        <?= __('Sign Ups') ?>&nbsp;&nbsp;
        <small style="color:white;margin-right:20px;">[ by show ]</small>
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
        <?= $this->Html->link(__('Shows By Month'), ['controller' => 'months', 'action' => 'index'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'All Shows']) ?>
            <?= $this->Html->link(__('Practices'), ['controller' => 'practices', 'action' => 'index'], ['class' => 'btn btn-default btn-sm', 'title' => 'Practices']) ?>
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
            <li role="presentation"  class="disabled"><a href="#"><strong>Icon Legend:</strong></a> &nbsp;&nbsp;</li>
            <li role="presentation"  class="disabled"><a href="#"><i class="fas fa-eye fa-l  fa-fw text-success"></i> View and signup for show</a></li>
            <li role="presentation"  class="disabled"><a href="#"><i class="fas fa-pen-alt fa-l fa-fw text-success"></i> One click show sign up</a></li>
            <li role="presentation"  class="disabled"><a href="#"><?= $this->Html->image('ref.png', ['title' => 'need a ref or host']) ?> Need ref / host </a></li>
            <li role="presentation"  class="disabled"><a href="#"><?= $this->Html->image('voice.png', ['title' => 'need a voice or DJ', 'class' => 'text-sucesss']) ?> Need voice / DJ</a></li>
            </ul>
            <div style="clear: both;"></div>

                    <table class="table table-hover table-striped table-bordered rep" cellpadding="0" cellspacing="0">
        <thead>
                <th class="iconBox" ;>
                    <?= __('') ?>
                </th>
                <th class="iconBox" ;>
                    <?= __('') ?>
                </th>
                <th class="iconBox" ;>
                    <?= __('') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-calendar fa-l fa-fw"></i>&nbsp;
                    <?= $this->Paginator->sort('dropdown_id', 'Show') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-calendar-alt fa-l fa-fw"></i>&nbsp;
                    <?= $this->Paginator->sort('schedule', 'Date') ?>
                </th>
                <th style="text-align: center;" scope="col">
                    <i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
                    <?= $this->Paginator->sort('signups_open', 'Sign Ups Open') ?>
                </th>
                <th style="text-align: center;" scope="col">
                    <i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
                    <?= __('Sign Ups') ?>
                    </th>
                            <th style="text-align: center" scope="col">
                                <i class="fas fa-people-carry fa-l fa-fw"></i>&nbsp;
                                <?= __('Needs') ?>
                            </th>
        </thead>
            <?php foreach ($shows as $show) : ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'signup', $show->id], ['class' => 'fas fa-eye fa-l fa-fw text-success', 'title' => 'View Show']) ?>
                </td>
                <td>
                    <?php if ($show->signups_open == 1 && $show->visible == 1) : ?>
                    <?= $this->Form->create(null, [
                        'url' => ['controller' => 'Months', 'action' => 'view', $show->month_id], ['class' => 'form-horizontal']
                    ]); ?>
                    <?php
                    echo $this->Form->hidden('show_id', ['value' => $show->id]);
                    echo $this->Form->hidden('user_id', ['value' => $userId]);
                    echo $this->Form->hidden('month_id', ['value' => $show->month_id]);
                    ?>
                    <a href="#" onclick="this.parentNode.submit();" title="Sign Up"><i class="fas fa-pen-alt fa-1x fa-fw text-success"></i></a>
                    <?= $this->Form->end() ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($show->show_url)) : ?>
                    <a href="<?= $show->show_url ?>" target="_blank" title="Show URL">
                        <i class="fab fa-chrome fa-l text-success fa-fw"></i>
                    </a>
                    <?php endif; ?>
                </td>
                <td>
                    <?= $show->dropdown->name . "&nbsp;<strong><span class='myBlue small'>(&nbsp;" . $show->schedule->format('D') . "&nbsp;)</span></strong>" ?>
                </td>
                <td>
                    <?= $show->schedule->format('M. j, Y g:i a') ?>
                </td>
                <td style="text-align: center;">
                    <?= $show->signups_open ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                </td>
                <td style="text-align: center;">
                    <?= $show->numberOfSignups() ? $show->numberOfSignups() : '0' ?>
                    </td>
                    <td style="text-align: center;">
                                <?= $show->ref_needed ? '   ' . $this->Html->image('ref.png', ['class' => 'resize', 'title' => 'need a ref']) . '  ' : $this->Html->image('need.png', ['class' => 'resize']) . '  ' ?>
                                <?php if ($show->voice_needed || $show->host_needed == 1) {
                                    echo $this->Html->image('voice.png', ['class' => 'resize', 'title' => 'need a voice or DJ']);
                                } else {
                                    echo $this->Html->image('need.png', ['class' => 'resize']);

                                } ?>
                            </td>
            </tr>
            <?php endforeach; ?>
        <tfoot>
            <td colspan="8">
                <?php if (empty($show)) : ?>
                <p class="text-md-center">Currently, there are no available shows</p>
                <?php endif; ?>&nbsp;

                <?php echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Shows')]); ?>


            </td>
        </tfoot>
    </table>
</div>