<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="practices view large-12 medium-12 columns content">
    <div class="pageTitle">
        <h1>
            <?= h($practice->title) ?>
        </h1>
        <h2>
            <?= h($practice->schedule->format('l, F j, Y - g:i a')) ?>
        </h2>
        <h3><i class='fas fa-chalkboard-teacher'></i> &nbsp;&nbsp;
            <?= h($practice->leader) ?>
            <?= $this->Html->link(__('Back'), ['controller' => 'practices', 'action' => 'dashboard'], ['class' => 'btn btn-default btn-sm pull-right', 'title' => 'Practice List']) ?>

        </h3>
    </div>
    <hr />
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" style="padding: .25rem">
            <div class="panel-heading" role="tab" id="headingOne">
                <h2 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        <span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Practice
                        Description
                    </a>
                </h2>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body" style="background-color:white;">
                    <?= $practice->description; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($practice->open == 1) {

				echo $this->Form->create($checkin, ['class' => 'form-inline']);
				echo $this->Form->hidden('practice_id', ['default' => $practice->id]);
				echo "<div class='form-group'>";
				echo "<div class='col-sm-10'>";
				echo $this->Form->control('user_id', ['label' => false, 'div' => false, 'options' => $users, 'empty' => true, 'default' => 'Check-in Player', 'class' => 'form-control']);
				echo "</div>";
				echo "</div>";
				echo $this->Form->button('Submit', ['class' => 'btn btn-primary btn-sm']);
				echo $this->Form->end();

			} else {


				echo "<div class='alert alert-danger' role='alert'> Check-in for practice has been disabled.  Please contact the instructor if you need to check in to practice</div>";

			};
			?>

    <hr />

    <div class="related">
        <h4>
            <?= __('Attendance') ?>
        </h4>
        <?php if (!empty($checkins)) : ?>
        <?php $i = 0; ?>
        <table class="basicTable" cellpadding="0" cellspacing="0">
            <thead>
                <th scope="col">
                    <?= __('Player') ?>
                </th>
                <th scope="col">
                    <?= __('Date and Time') ?>
                </th>
            </thead>
            <?php foreach ($checkins as $checkins) : ?>
            <?php $i++ ?>
            <tr>
                <td>
                    <?= h($i . ". " . $checkins->user->DisplayName); ?>
                </td>
                <td>
                    <?= h($checkins->created) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tfoot>
                <td colspan="2">&nbsp;</td>
            </tfoot>
        </table>
    </div>
    <?php endif; ?>

</div>