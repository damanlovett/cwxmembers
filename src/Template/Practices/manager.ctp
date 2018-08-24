<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice[]|\Cake\Collection\CollectionInterface $practices
 */
?>
<div class="practices index large-12 medium-11 columns content">
    <h3><i class="fas fa-chalkboard fa-l fa-fw"></i>&nbsp;&nbsp;
        <?= __('Practice Manager') ?>
        <?= $this->Html->link(__('<span class = "glyphicon glyphicon-plus"></span> Practice'), ['action' => 'add'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'New Practice', 'escape' => false]) ?>

    </h3>
    <?php foreach ($information as $information) : ?>

    <div class="alert alert-success" role="alert">
        <p>
            <strong>Information displayed on practice page: </strong>
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
                <th scope="col">
                    <i class="fas fa-chalkboard  fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort('title', 'Practice') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-clock  fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort('schedule', 'Date') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-chalkboard-teacher fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort('leader') ?>
                </th>
                <th scope="col" style="text-align: center;">
                    <?= __('Open') ?>
                </th>
                <th scope="col" style="text-align: center;">
                    <?= __('Visible') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practices as $practice) : ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'mview', $practice->id], ['class' => 'fas fa-eye fa-l  fa-fw text-success', 'title' => 'View Practice']) ?>
                </td>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $practice->id], ['class' => 'fas fa-edit fa-l  fa-fw text-success', 'title' => 'Edit Show']) ?>
                </td>
                <td>
                    <?= h($practice->title) ?>
                </td>
                <td>
                    <?= $practice->schedule ? $this->Switches->datetime($practice->schedule) : '' ?>
                </td>
                <td>
                    <?= h($practice->leader) ?>
                </td>
                <td style="text-align: center; width:50%;">
                    <?= $practice->open ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                </td>
                <td style="text-align: center;">
                    <?= $practice->visible ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td colspan="7">&nbsp;</td>
        </tfoot>
    </table>
    <?php if (!empty($practices)) {
        echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Practices')]);
    } ?>
</div>