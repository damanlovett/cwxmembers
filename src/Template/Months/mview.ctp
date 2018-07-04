<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>

<div class="months view large-12 medium-12 columns content">
<h3><i class="fas fa-calendar-alt fa-2x fa-fw"></i><?= $month->title." ".$month->year; ?></h3>


<div class="row">
    <div class="col-md-6">
<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default" style="padding: .25rem">
    <div class="panel-heading" role="tab" id="headingOne">
      <h3 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Add Show <i class="fas fa-calendar fa-sm fa-fw"></i>
        </a>
      </h3>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<!----- Form 1 --->

        <?= $this->Form->create(null, [
                                'url' => ['controller' => 'Shows', 'action' => 'madd', $month->id], ['class'=>'form-horizontal']
                            ]); ?>
    <fieldset>
        <?php
            echo $this->Form->hidden('month_id', ['value' => $month->id]);
            echo $this->Form->control('dropdown_id', ['label'=>'Type of Show','options' => $dropdowns, 'empty' => true]);
        ?>

        <div class="um-form-row form-group">
            <div class="col-md-12">
                <?php echo $this->Form->control('schedule', ['type'=>'text', 'placeholder'=>'Day of Show', 'label'=>false, 'div'=>false, 'size' => 3, 'class'=>'form-control datetimepicker']); ?>
            </div>
        </div>
        <div class="um-form-row form-group">
            <div class="col-sm-12">
        <?php echo $this->Form->control('signups_open', ['label'=>'Sign Ups Open', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
            </div>
        </div>
        <div class="um-form-row form-group">
            <div class="col-md-12">
        <?php echo $this->Form->control('visible', ['label'=>'Visble', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
            </div>
        </div>
        <hr />
        <div class="um-form-row form-group">
            <div class="col-md-12">
        <?php echo $this->Form->control('notes', ['type'=>'textarea', 'class'=> 'form-control textarea']); ?>
            </div>
        </div>
    </fieldset>
                <?= $this->Form->button(__('Add Show'), ['class' => 'btn btn-success']) ?>
                                <?= $this->Form->end() ?>

<!----- End of Form 1 --->





      </div>
    </div>
  </div>
</div>
        </div>

    <div class="col-md-6">
<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default" style="padding: .25rem">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h3 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Add Practice <i class="fas fa-chalkboard fa-sm fa-fw"></i>
        </a>
      </h3>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

<!------- Form 2 ------->
        <?= $this->Form->create(null, [
                                'url' => ['controller' => 'Practices', 'action' => 'madd', $month->id], ['class'=>'form-horizontal']
                            ]); ?>
    <fieldset>
        <?= $this->Form->hidden('month_id', ['value' => $month->id]); ?>

            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('title');?>
            </div>
            </div>
            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('schedule', ['type'=>'text', 'placeholder'=>'Day of Practice', 'label'=>false, 'div'=>false, 'size' => 3, 'class'=>'form-control datetimepicker']); ?>
            </div>
            </div>
            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('leader');?>
            </div>
            </div>
            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('visible', ['label'=>'Visble', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
            </div>
            </div>
            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('open', ['label'=>'Open', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
            </div>
            </div>
            <hr />
            <div class="um-form-row form-group">
            <div class="col-md-12">
            <?= $this->Form->control('description', ['type'=>'textarea', 'class'=> 'form-control textarea']); ?>
            </div>
            </div>
            <div class="um-form-row form-group">
            <div class="col-md-12">
    </fieldset>
                <?= $this->Form->button(__('Add Practice'), ['class' => 'btn btn-success']) ?>
                                <?= $this->Form->end() ?>


<!------- End Form 2 ------->

      </div>
    </div>
  </div>
</div>
        </div>

</div>



<div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">&nbsp;</h2>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab"><i class="fas fa-calendar fa-sm fa-fw"></i>&nbsp;&nbsp;Shows</a></li>
                            <li><a href="#tab2" data-toggle="tab"><i class="fas fa-chalkboard fa-sm fa-fw"></i>&nbsp;&nbsp;Practices</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

        <?php if (!empty($month->shows)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th style="text-align: center" scope="col"><?= __('Signups Open') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </thead>
            <?php foreach ($month->shows as $shows): ?>
            <tr>
                <td><?= h($shows->Dropdowns['name']) ?></td>
                <td><?= h($shows->schedule->format('D jS - g:i a')) ?></td>
                <td style="text-align: center"><?= $shows->signups_open ? "<i class='fas fa-circle text-success'></i>" : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shows', 'action' => 'view', $shows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shows', 'action' => 'edit', $shows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shows', 'action' => 'delete', $shows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="4">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>

                        </div>
                        <div class="tab-pane" id="tab2">

        <?php if (!empty($month->practices)): ?>
        <table  class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Leader') ?></th>
            </thead>
            <?php foreach ($month->practices as $practices): ?>
            <tr>
                <td><?= h($practices->title) ?></td>
                <td><?= h($practices->schedule->format('D jS - g:i a')) ?></td>
                <td><?= h($practices->leader) ?></td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="3">&nbsp;</td>
            </tfoot>
        </table>
        <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>

</div>
