<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month[]|\Cake\Collection\CollectionInterface $months
 */
?>
<div class="months index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('Sign Up Manager') ?>&nbsp;&nbsp;<small style="color:white;margin-right:20px;">[ by month ]</small>
        <div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
    <?= $this->Html->link(__('All Shows'), ['controller'=>'shows', 'action' => 'manager'], ['class'=>'btn btn-default btn-sm', 'title'=>'View All Shows']) ?>
    <?= $this->Html->link(__('+ Month '), ['action' => 'add'], ['class'=>'btn btn-success btn-sm', 'title'=>'Add Month']) ?>
        </div>


    </h3>
<?php foreach($information as $information): ?>

        <div class="alert alert-success" role="alert">
        <p><strong>Information displayed on sign up pages: </strong></p>
        <br />
        <div class="well well-sm" style="background-color:white;"><i class="fas fa-info-circle fa-2x fa-fw fa-pull-left"></i><?= $information->page_content ?>
        <?= $this->Html->link(__('Edit Text'), ['action' => 'add'], ['class'=>'btn btn-default btn-sm pull-left', 'title'=>'Edit Text', 'disabled'=>true]) ?>
        <div style="clear: both;"></div>
        </div>

        </div>

<?php endforeach; ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="iconBox"><?= __('') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_friday', 'Month') ?></th>
                <th scope="col"style="text-align:center;"><?= __('Shows') ?></th>
                <th scope="col"style="text-align:center;"><?= __('Signups') ?></th>
                <th scope="col"style="text-align:center;"><?= __('Practices') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($months as $month): ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'mview', $month->id], ['class'=>'fas fa-calendar-alt fa-l fa-fw text-success', 'title'=>'Manage Month']) ?>
                </td>
                <td><?= h($month->title." ".$month->year) ?></td>
                <td style="text-align:center;"><?= $month->numberOfShows() ?></td>
                <td style="text-align:center;"><?= $month->numberOfSignups() ?></td>
                <td style="text-align:center;"><?= $month->numberOfPractices() ?></td>
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
                                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                            </div>

                        </td>
                    </tfoot>
    </table>
</div>
</div>
