<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month[]|\Cake\Collection\CollectionInterface $months
 */
?>
<?php $this->assign('title', 'Sign Ups'); ?>

<div class="months index large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;&nbsp;
        <?= __('Sign Ups') ?>&nbsp;&nbsp;
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
            <?= $this->Html->link(__('Available Shows'), ['controller' => 'shows', 'action' => 'dashboard'], ['class' => 'btn btn-default btn-sm', 'title' => 'All Shows']) ?>
            <?= $this->Html->link(__('Practices'), ['controller' => 'practices', 'action' => 'index'], ['class' => 'btn btn-default btn-sm', 'title' => 'Practices']) ?>
        </div>
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
                <th style="width:30px;">
                    <?= __('') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('first_friday', 'Month') ?>
                </th>
                <th scope="col" style="text-align:center;">
                    <i class="fas fa-calendar fa-l fa-fw"></i>&nbsp;
                    <?= __('Shows') ?>
                </th>
                <th scope="col" style="text-align:center;">
                    <i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
                    <?= __('Sign Ups') ?>
                </th>
                <th scope="col" style="text-align:center;">
                    <i class="fas fa-chalkboard-teacher fa-l fa-fw"></i>&nbsp;
                    <?= __('Practices') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($months as $month) : ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'mobile', $month->id], ['class' => 'fas fas fa-pencil-alt fa-l fa-fw text-success', 'title' => 'Mobile View']) ?>
                </td>
                <td>
                    <?= h($month->title . " " . $month->year) ?>
                </td>
                <td style="text-align:center;">
                    <?= $month->numberOfShows() ?>
                </td>
                <td style="text-align:center;">
                    <?= $month->numberOfSignups() ?>
                </td>
                <td style="text-align:center;">
                    <?= $month->numberOfPractices() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td colspan="5">

                <!-- <div class="paginator">
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
                </div> -->

            </td>
        </tfoot>
    </table>
    <?php echo $this->element('Usermgmt.pagination', ['paginationText' => __('Number of Shows')]); ?>
</div>
</div>