<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Month'), ['action' => 'edit', $month->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Month'), ['action' => 'delete', $month->id], ['confirm' => __('Are you sure you want to delete # {0}?', $month->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Practices'), ['controller' => 'Practices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Practice'), ['controller' => 'Practices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shows'), ['controller' => 'Shows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Show'), ['controller' => 'Shows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="months view large-9 medium-8 columns content">
    <h3><?= h($month->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($month->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($month->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($month->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($month->created) ?></td>
        </tr>
    </table>


<div>

    <div id="tabs"><!-- Nav tabs -->
  <ul>
    <li><a href="#tabs-1">Practices</a></li>
    <li><a href="#tabs-2">Signups</a></li>
    <li><a href="#tabs-3">Shows</a></li>
  </ul>

  <!-- Tab panes -->

    <div id="tabs-1" class="related">
        <h4><?= __('Related Practices') ?></h4>
        <?php if (!empty($month->practices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('Schedule') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Leader') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($month->practices as $practices): ?>
            <tr>
                <td><?= h($practices->id) ?></td>
                <td><?= h($practices->month_id) ?></td>
                <td><?= h($practices->schedule) ?></td>
                <td><?= h($practices->title) ?></td>
                <td><?= h($practices->leader) ?></td>
                <td><?= h($practices->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Practices', 'action' => 'view', $practices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Practices', 'action' => 'edit', $practices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Practices', 'action' => 'delete', $practices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>


    </div>
    <div id="tabs-2" class="related">
        <h4><?= __('Related Signups') ?><?= $this->Paginator->counter('Number of Signups {{count}}');?>
        </h4>
        <?php if (!empty($month->signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
            </tr>
            <?php foreach ($month->signups as $signups): ?>
            <tr>
                <td><?= h($signups->id) ?></td>
                <td><?= h($signups->month_id) ?></td>
                <td><?= h($signups->Users['first_name']." ".$signups->Users['last_name']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>


<div id="tabs-3" class="related">
        <h4><?= __('Related Shows') ?></h4>
        <?php if (!empty($month->shows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Month Id') ?></th>
                <th scope="col"><?= __('Dropdown Id') ?></th>
                <th scope="col"><?= __('Schedule') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Signups Open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($month->shows as $shows): ?>
            <tr>
                <td><?= h($shows->id) ?></td>
                <td><?= h($shows->Months['title']) ?></td>
                <td><?= h($shows->Dropdowns['name']) ?></td>
                <td><?= h($shows->schedule) ?></td>
                <td><?= h($shows->notes) ?></td>
                <td><?= h($shows->signups_open) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shows', 'action' => 'view', $shows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shows', 'action' => 'edit', $shows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shows', 'action' => 'delete', $shows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>


    </div>

    </div>
  </div>
</div> <!-- End of Tab -->

</div>












</div>
