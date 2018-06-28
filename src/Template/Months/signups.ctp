<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>

<div class="months signups large-12 medium-11 columns content">

        <div class="pageTitle">
            <h3><?= $month->title." ".$month->year; ?></h3>
        </div>
        <p>


<div class="container-fluid">

<div class="row">
<div class=" col-sm-4">
<div class="panel panel-default slim-panel">
  <div class="panel-heading">ComedyWorx Show</div>
  <div class="panel-body">

        <?php if (!empty($cshow)): ?>
            <ol class="fancyList">
                        <?php foreach ($cshow as $cshow): ?>
            <li><?= h($cshow->schedule->format('l jS - g:i a')) ?>

            <?php if($cshow->signups_open == 1) { echo $this->Html->link(__('Signup'), ['controller' => 'Shows', 'action' => 'view', $cshow->id]);} ?></li>

            <?php endforeach; ?>
            </ol>
        <?php endif; ?>




  </div>
</div>
</div>

<div class=" col-sm-4">
<div class="panel panel-default slim-panel">
  <div class="panel-heading">Matinee</div>
  <div class="panel-body">

        <?php if (!empty($mshow)): ?>
            <ol class="fancyList">
            <?php foreach ($mshow as $mshow): ?>
            <li><?= h($mshow->schedule->format('l jS - g:i a')) ?>

            <?php if($cshow->signups_open == 1) { echo $this->Html->link(__('Signup'), ['controller' => 'Shows', 'action' => 'view', $mshow->id]);} ?></li>

            <?php endforeach; ?>
        </ol>
        <?php endif; ?>


  </div>
</div>
</div>

<div class=" col-sm-4">
<div class="panel panel-default slim-panel">
  <div class="panel-heading">Late Night</div>
  <div class="panel-body">

        <?php if (!empty($hshow)): ?>
            <ol class="fancyList">
            <?php foreach ($hshow as $hshow): ?>
                <li><?= h($hshow->dropdown->name) ?><br /><?= h($hshow->schedule->format('l jS - g:i a')) ?>
                    <?php if($hshow->signups_open == 1) { echo $this->Html->link(__('Signup'), ['controller' => 'Shows', 'action' => 'view', $hshow->id]);} ?>
                </li>
            <?php endforeach; ?>
            </ol>
        <?php endif; ?>

  </div>
</div>
</div>

</div> <!-- row -->

</div>




<fieldset>
    <legend>
        My Schedule
    </legend>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('show_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($signups as $signup): ?>
            <tr>
                <td>Harry Show</td>
                <td><?= h($signup->created) ?></td>
                <td><?= h($signup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $signup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $signup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $signup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signup->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</fieldset>

</div>
