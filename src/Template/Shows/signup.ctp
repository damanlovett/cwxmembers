<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows view large-12 medium-11 columns content">
	<h3>
		<i class="fas fa-calendar fa-l fa-fw"></i>&nbsp;&nbsp;
		<?= __('Show Sign Up')?>


		<div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
			<?= $this->Html->link(__($show->schedule->format('F')), ['controller'=>'Months', 'action' => 'view', $show->month_id], ['class'=>'btn btn-sm', 'title'=>'Back to Month']) ?>
			<?= $this->Html->link(__('Show List'), ['controller'=>'Months', 'action' => 'index'], ['class'=>'btn btn-default btn-sm', 'title'=>'Back to Shows']) ?>
		</div>
	</h3>
	<div class="fpageTitle">
		<h1>
			<?= h($show->dropdown->name) ?>
		</h1>
		<h2>
			<?= h($show->DisplayName) ?>
		</h2>
		<h2>
			<?php if($show->signups_open == 1  ) : ?>

			<?= $this->Form->create(null, [
                        'url' => ['controller' => 'Shows', 'action' => 'signup',$show->id]
                    ]); ?>
			<?php
                                echo $this->Form->hidden('show_id', ['value' => $show->id]);
                                echo $this->Form->hidden('user_id', ['value' => $this->UserAuth->getUserId()]);
                                echo $this->Form->hidden('month_id', ['value' => $show->month_id]);
                            ?>
			<?= $this->Form->button(__('Sign Up'), ['class' => 'btn btn-success']) ?>
			<?= $this->Form->end() ?>
			<?php else : ?>

			<?= "Sign ups are closed <br />"; ?>

			<?php endif; ?>

		</h2>

	</div>

	<?php if (!empty($show->notes)) :?>

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default" style="padding: .25rem">
			<div class="panel-heading" role="tab" id="headingOne">
				<h2 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span class="glyphicon glyphicon-triangle-bottom" style="padding-right: 10px"></span>Show Information
					</a>
				</h2>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body" style="background-color:white;">
					<?= $show->notes; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="related">
		<h4>
			<?= __('Sign Ups') ?>
		</h4>

		<?php if (!empty($signups)): ?>
		<table class="table table-striped" cellpadding="0" cellspacing="0">
			<tr>
				<th scope="col">
					<?= h('Player') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('created', 'Signed Up') ?>
				</th>
			</tr>
			<?php foreach ($signups as $signups): ?>


			<?php if($signups->user->id == $this->UserAuth->getUserId()) : ?>
			<tr class="success">
				<?php else : ?>
				<tr>
					<?php endif; ?>
					<td>
						<?php if($signups->user->id == $this->UserAuth->getUserId() && $show->signups_open == 1  ) : ?>
						<?= $this->Form->postLink(__(''), ['controller' => 'signups', 'action' => 'remove', $signups->id], ['class'=>'fas fa-calendar-times fa-lg fa-fw text-dander', 'title'=>'Delete Signup']) ?>
						<?php elseif($signups->user->id == $this->UserAuth->getUserId() && $show->signups_open == 0  ) : ?>
						<?= "<i class='fas fa-circle fa-xs fa-fw text-success'></i>";  ?>
						<?php endif; ?>
						&nbsp;&nbsp;
						<?= h($signups->user->fullName) ?>
					</td>

					<td>
						<?= h($signups->created) ?>
					</td>
				</tr>
				<?php endforeach; ?>
		</table>
		<?php endif; ?>
	</div>

	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p>
			<?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
		</p>
	</div>


	<div>

	</div>
</div>