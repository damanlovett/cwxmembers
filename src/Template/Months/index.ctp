<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month[]|\Cake\Collection\CollectionInterface $months
 */
?>
<div class="months index large-12 medium-11 columns content">
    <h3><i class="fas fa-calendar fa-1x fa-fw"></i>&nbsp;&nbsp;<?= __('Sign Ups') ?></h3>

        <table  class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width:30px;"><?= __('') ?></th>
                <th style="width:30px;"><?= __('') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_friday', 'Month') ?></th>
                <th scope="col"style="text-align:center;"><?= __('# of Shows') ?></th>
                <th scope="col"style="text-align:center;"><?= __('# of Sign Ups') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($months as $month): ?>
            <tr>
                <td>
                    <?= $this->Html->link(__(''), ['action' => 'view', $month->id], ['class'=>'fas fa-eye fa-l fa-fw text-success', 'title'=>'View Month']) ?>
                </td>
                <td>                    <a href=".$mon" title="Show URL"><i class="fab fa-chrome fa-lg text-primary fa-fw"></i></a>
                </td>
                <td><?= h($month->title." ".$month->year) ?></td>
                <td style="text-align:center;"><?= $month->numberOfShows() ?></td>
                <td style="text-align:center;"><?= $month->numberOfSignups() ?></td>
                <td><?= h($month->created->format('m/d/y - g:i a')) ?></td>
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
