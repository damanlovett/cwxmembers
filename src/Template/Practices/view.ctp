<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practice $practice
 */
?>
<div class="practices view large-12 medium-11 columns content">
	<h3>
		<i class="fas fa-chalkboard fa-1x fa-fw"></i>&nbsp;&nbsp;
		<?= h($practice->title) ?>
		<div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
			<?= $this->Html->link(__('Practices'), ['controller' => 'practices', 'action' => 'index','plugin'=>false], ['class'=>'btn btn-default btn-sm']);?>
			<?= $this->Html->link(__('Month'), ['controller' => 'months', 'action' => 'view',$practice->month_id, 'plugin'=>false], ['class'=>'btn btn-default btn-sm']);?>
		</div>
	</h3>
	<h2>
		<?= h($practice->schedule->format('l, F j, Y - g:i a'))?>
	</h2>
	<h3>
		<i class='fas fa-chalkboard-teacher'></i> &nbsp;&nbsp;
		<?= h($practice->leader)?>
	</h3>
	<hr />
	<?= $practice->description; ?>

	<?php if ($practice->open == 1) {

    echo "<div class='alert alert-danger' role='alert'> Check-in is enable, but you are unable to checkin without approval.  Please contact the instructor if you need to check in to practice</div>";

                    } else {


    echo "<div class='alert alert-danger' role='alert'> Check-in for practice has been disabled.  Please contact the instructor if you need to check in to practice</div>";

                };
                ?>

	<hr />


</div>
</div>