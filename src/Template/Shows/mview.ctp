<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows view large-12 medium-11 columns content">
<h3><i class="fas fa-calendar fa-2x fa-fw"></i><?= __('Shows') ?></h3>
       <div class="fpageTitle">
            <h1><?= h($show->dropdown->name) ?></h1>
            <h2><?= h($show->schedule->format('F j, Y - g:i A')) ?></h2>
            <h3>Sign-ups: <?= $show->signups_open ? "Open" : "Close" ?></h3>
            <h3>Visible: <?= $show->signups_open ? "Yes" : "No" ?></h3>
        </div>


    <div class="related">
        <h4><?= __('Line Ups') ?></h4>
        <?php if (!empty($inshows)): ?>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Player') ?></th>
                <th scope="col"><?= __('Performing') ?></th>
                <th scope="col"><?= __('Support Role') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
            <?php foreach ($inshows as $inshows): ?>
            <tr>
                <td><?= h($inshows->user->fullName) ?></td>
                <td><?php if (!empty($inshows->role_id)) : ?> <?= $inshows->role->name ?> <?php else : ?> <?= "none" ?> <?php endif; ?> </td>
                <td><?php if (!empty($inshows->roles2)) : ?> <?= $inshows->roles2->name ?> <?php else : ?> <?= "none" ?> <?php endif; ?> </td>
                <td class="actions">
                    <?= $this->Form->postLink(__(''), ['controller' => 'Assignments', 'action' => 'remove', $inshows->id], ['class'=>'fas icon fa-lg fa-fw fa-user-times', 'title'=>'Delete Assignment']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>


<?php /*
<?= $this->Html->link('Report', ['plugin' => false,'action' => 'signupreport', $show->id], ['escape'=>false]) ?>
<?= $this->Html->link('Report', ['plugin' => false,'action' => 'jump', $show->id], ['escape'=>false]) ?>
*/?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default" style="padding: .25rem">
    <div class="panel-heading" role="tab" id="headingOne">
      <h5>
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Make Assignment
        </a>
      </h3>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

        <?= $this->Form->create(null, [
                                'url' => ['controller' => 'Assignments', 'action' => 'madd', $show->id]
                            ]); ?>
                <fieldset>
                <legend><?= __('Assignment') ?></legend>

                    <?= $this->Form->hidden('show_id', ['value' => $show->id]);?>
                <div class="row">
                <div class="col-md-4">
                    <?= $this->Form->control('user_id', ['label'=>'Player','options' => $users, 'empty' => true]);?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('role_id', ['label' => 'Performing', 'empty' => '---']);?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('role2_id', ['label' => 'Supporting Role', 'options' => $roles, 'empty' => '---']);?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <?= $this->Form->control('notes', ['label' => 'Notes', 'type' => 'textarea', 'class'=> 'form-control']);?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <?= $this->Form->button(__('Add Assignment'), ['class' => 'btn btn-success']) ?>
                                <?= $this->Form->end() ?>
                </div>
                </div>
                </fieldset>

      </div>
    </div>
  </div>
</div>









<div class="panel panel-primary">

                <div class="panel-heading">
                    <i class="fas fa-calendar fa-s fa-fw"></i>Show Information
                </div>

    <div class="row">

        <div class="col-md-4">

            <fieldset>

                <legend>Show Sign Ups</legend>
            <?php if (!empty($signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php $i=0?>
            <?php foreach ($signups as $signups): ?>
                <?php $i++ ?>
            <tr>
                <td>
<?= h($signups->user->fullName) ?></td>
                <td><?= h($signups->created->format('M jS')) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

            </fieldset>

        </div>

        <div class="col-md-4">


            <fieldset>

                <legend>Monthly Sign Ups</legend>

                    <?php if (!empty($signlist)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($signlist as $signlist): ?>
            <tr>
                <td><?= h($signlist->user['fullName'])?>&nbsp;(&nbsp;<?= h($signlist->count) ?>&nbsp;)</td>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

            </fieldset>

        </div>

        <div class="col-md-4">
            <fieldset>

                <legend>Call Outs</legend>

                    <?php if (!empty($callouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($callouts as $callouts): ?>
            <tr>
                <td><?= h($callouts->user->fullName) ?>&nbsp;&nbsp;<?= $this->Html->link(__(''), ['controller' => 'Assignments', 'action' => 'edit', $callouts->id], ['class'=>'fas fa-edit fa-s  fa-fw text-warning', 'title'=>'Edit Assignment']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
            </fieldset>

        </div>

    </div>



</div>
</div>

</div>
