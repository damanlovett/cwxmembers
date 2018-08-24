<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="shows index large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-calendar fa-1 fa-fw"></i>&nbsp;&nbsp;
        <?= __('Show Up Manager') ?>&nbsp;&nbsp;
        <small style="color:white;margin-right:20px;">[ by Show ]</small>
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
            <?= $this->Html->link('<span class="far fa-eye fa-l  fa-fw"></span> Month', ['controller' => 'months', 'action' => 'manager'], ['class' => 'btn btn-success', 'title' => 'View by Month', 'escape' => false]) ?>

            <?= $this->Html->link('<span class = "glyphicon glyphicon-plus"></span> show', ['action' => 'add'], ['class' => 'btn btn-success', 'title' => 'New Show', 'escape' => false]) ?>
        </div>
    </h3>
    <?php foreach ($information as $information) : ?>

    <div class="alert alert-success" role="alert">
        <p>
            <strong>Information displayed on sign up page: </strong>
        </p>
        <br />
        <div class="well well-sm" style="background-color:white;">
            <i class="fas fa-info-circle fa-2x fa-fw fa-pull-left"></i>
            <?= $information->page_content ?>
            <?= $this->Html->link(__('Edit Text'), ['action' => 'add'], ['class' => 'btn btn-default btn-sm pull-left', 'title' => 'Edit Text', 'disabled' => true]) ?>
            <div style="clear: both;"></div>
        </div>

    </div>

    <?php endforeach; ?>
    <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="iconBox">
                    <?= __('') ?>
                </th>
                <th class="iconBox">
                    <?= __('') ?>
                </th>
                <th class="iconBox">
                    <?= __('') ?>
                </th>
                <th class="iconBox">
                    <?= __('') ?>
                </th>
                <th class="iconBox">
                    <?= __('') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-cog fa-1x fa-fw myRed"></i>
                    <?= $this->Paginator->sort('dropdown_id', 'Show') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-clock fa-1x fa-fw myRed"></i>
                    <?= $this->Paginator->sort('month_id', 'Date') ?>
                </th>
                <th style="text-align: center" scope="col">
                    <i class="fas fa-pen-alt fa-1x fa-fw"></i>
                    <?= __('Sign Ups') ?>
                </th>
                <th style="text-align: center" scope="col">
                    <i class="fas fa-hands-helping fa-1x fa-fw "></i>
                    <?= __('Needs') ?>
                </th>
                <th style="text-align: center" scope="col">
                    <?= $this->Paginator->sort('signups_open', 'Sign-ups Open') ?>
                </th>
                <th style="text-align: center" scope="col">
                    <?= $this->Paginator->sort('visible', 'Visible') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0 ?>
            <?php foreach ($shows as $show) : ?>
            <?php $i++ ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'mview', $show->id], ['class' => 'fas fa-user-plus fa-l  fa-fw text-success', 'title' => 'Make Assignment']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__(''), ['controller' => 'Months', 'action' => 'view', $show->month->id], ['class' => 'fas fa-eye fa-l  fa-fw text-success', 'title' => 'View Month']) ?>
                    </li>
                    <td>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $show->id], ['class' => 'fas fa-edit fa-l  fa-fw text-success', 'title' => 'Edit Show']) ?>
                    </td>
                    <td>
                        <?= $this->Form->postLink(__(''), ['action' => 'remove', $show->id], ['class' => 'fas fa-trash-alt fa-l  fa-fw text-danger', 'title' => 'Delete Show']) ?>
                    </td>
                    <td class="iconBox">
                        <?= __('') ?>
                    </td>
                    <td>
                        <?= $show->dropdown->name ?>
                    </td>
                    <td>
                        <?= $this->Switches->datetime($show->schedule) ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $show->numberOfSignups() ?>

                        <?php if (!empty($show->players_needed)) : ?>

                        need


                        <?= $show->players_needed ?>
                        <?php if ($show->numberOfSignups() > $show->players_needed || $show->numberOfSignups() == $show->players_needed) echo "<i class='fas fa-check fa-l fa-fw text-success'></i>"; ?>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $show->ref_needed ? '   ' . $this->Html->image('ref.png', ['title' => 'need a ref']) . '  ' : $this->Html->image('need.png') . '  ' ?>
                        <?= $show->voice_needed ? '   ' . $this->Html->image('voice.png', ['title' => 'need a voice']) . '  ' : '   ' . $this->Html->image('need.png') . '  ' ?>
                        <?= $show->host_needed ? '   ' . $this->Html->image('host.png', ['title' => 'need a host']) : '   ' . $this->Html->image('need.png') ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $show->signups_open ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $show->visible ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                    </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td colspan="11">&nbsp;</td>
        </tfoot>
    </table>
    <?php if (!empty($shows)) {
				echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Shows')]);
			} ?>

</div>