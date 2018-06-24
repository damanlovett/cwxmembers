<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Practice'), ['action' => 'edit', $practice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Practice'), ['action' => 'delete', $practice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Practices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Practice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?> </li>
    </ul>
</nav>




<div class="practices view large-9 medium-8 columns content">
    <div class="pageTitle">
        <h3><?= h($practice->title) ?></h3>
        <h2><?= h($practice->schedule->format('l, F j, Y - g:i a')." :: ".$practice->leader) ?></h2>
    </div>

    <div class="row">


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default" style="padding: .25rem">
    <div class="panel-heading" role="tab" id="headingOne">
      <h2 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Practice Description
        </a>
      </h2>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?= $this->Text->autoParagraph(h($practice->description)); ?>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="related">
        <h4><?= __('Checkins') ?></h4>
        <?php $i = 0; ?>
        <?php if (!empty($practice->checkins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Member') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($practice->checkins as $checkins): ?>
                            <?php $i++;?>

            <tr>
                <td><?= h($i.". ".$checkins->Users['first_name']." ".$checkins->Users['last_name']) ?></td>
                <td><?= h($checkins->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Checkins', 'action' => 'view', $checkins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Checkins', 'action' => 'edit', $checkins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Checkins', 'action' => 'delete', $checkins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
