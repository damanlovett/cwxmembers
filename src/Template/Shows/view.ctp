<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows view large-9 medium-8 columns content">
        <div class="fpageTitle">
            <span class="line"><span class="date"><?= h($show->schedule->format('F j, Y - g:i A')) ?></span></span>
            <h1><?= h($show->dropdown->name) ?></h1>
        </div>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $show->has('month') ? $this->Html->link($show->month->title, ['controller' => 'Months', 'action' => 'view', $show->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dropdown') ?></th>
            <td><?= $show->has('dropdown') ? $this->Html->link($show->dropdown->name, ['controller' => 'Dropdowns', 'action' => 'view', $show->dropdown->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($show->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signups Open') ?></th>
            <td><?= $this->Switches->onOff($show->signups_open) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= h($show->schedule) ?></td>
        </tr>
    </table>
    <div class="row">
        <?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add', $show->id, 'month'=>$show->month_id]) ?>

    </div>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($show->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Line Ups') ?></h4>
        <?php if (!empty($inshows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Player') ?></th>
                <th scope="col"><?= __('Primary') ?></th>
                <th scope="col"><?= __('Secondary') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inshows as $inshows): ?>
            <tr>
                <td><?= h($inshows->user->first_name." ".$inshows->user->last_name) ?></td>
                <td><?= h($inshows->role->name) ?></td>
                <td><?= h($inshows->roles2->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $inshows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $inshows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $inshows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inshows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>




<div>




<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
                            <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
                            <li><a href="#tab3" data-toggle="tab">Tab 3</a></li>
                            <li><a href="#tab4" data-toggle="tab">Tab 4</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At</div>
                        <div class="tab-pane" id="tab2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>
                        <div class="tab-pane" id="tab3">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>
                        <div class="tab-pane" id="tab4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet,</div>
                    </div>
                </div>
            </div>




























  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#signups" aria-controls="signups" role="tab" data-toggle="tab">Signups</a></li>
    <li role="presentation"><a href="#callouts" aria-controls="callouts" role="tab" data-toggle="tab">Call Outs</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="signups">

<?php if (!empty($show->signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Player') ?></th>
                <th scope="col"><?= __('Assigned') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($show->signups as $signups): ?>
            <tr>
                <td><?= h($signups->Users['first_name']." ".$signups->Users['last_name']) ?></td>
                <td><?= h($signups->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Signups', 'action' => 'view', $signups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Signups', 'action' => 'edit', $signups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Signups', 'action' => 'delete', $signups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>



    </div><!-- tab 1 -->
    <div role="tabpanel" class="tab-pane" id="callouts">

        <?php if (!empty($callouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($callouts as $callouts): ?>
            <tr>
                <td><?= h($callouts->user->first_name." ".$callouts->user->last_name) ?> :: <?= h($callouts->role->name) ?> / <?= h($callouts->roles2->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $callouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $callouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $callouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>


    </div><!-- tab 2 -->
  </div>

</div>



</div>
