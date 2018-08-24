<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice[]|\Cake\Collection\CollectionInterface $practices
 */
?>
<div class="practices index large-12 medium-12 columns content">
    <h3>
        <i class="fas fa-chalkboard fa-l fa-fw"></i>&nbsp;&nbsp;
        <?= __('Practice Checkin') ?>
    </h3>

    <?php foreach ($information as $information) : ?>

    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle fa-3x fa-fw fa-pull-left"></i>
        <?= $information->page_content ?>
    </div>

    <?php endforeach; ?>
    <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width:40px;">
                    <?= __('') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-chalkboard fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort('title', 'Practice') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-clock fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort(' schedule', 'Date') ?>
                </th>
                <th scope="col">
                    <i class="fas fa-chalkboard-teacher fa-l fa-fw myRed"></i>
                    <?= $this->Paginator->sort('leader') ?>
                </th>
                <th scope="col" style="text-align: center; width:auto;">
                    <?= $this->Paginator->sort('open') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practices as $practice) : ?>
            <tr>
                <td>
                    <?php echo $this->Html->link(__(''), ['action' => 'checkin', $practice->id], ['class' => 'fas fa-clipboard-check fa-lg  fa-fw fa-l text-success', 'title' => 'View Practice']); ?>
                </td>
                <td>
                    <?= h($practice->title) ?>
                </td>
                <td>
                    <?= h($this->Switches->datetime($practice->schedule)) ?>
                </td>
                <td>
                    <?= h($practice->leader) ?>
                </td>
                <td style="text-align: center; width:auto;">
                    <?= $practice->open ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td colspan="5">

                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p>
                        <?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
                    </p>
                </div>

            </td>
        </tfoot>
    </table>
</div>
</div>
</div>