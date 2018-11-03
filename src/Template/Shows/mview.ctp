<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show $show
 */
?>
<div class="shows view large-12 medium-11 columns content">
	<h3>
		<i class="fas fa-cog fa-l fa-fw"></i>&nbsp;&nbsp;
		<?= __('Shows') ?>
		<div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
			<?= $this->Html->link(__('All Shows'), ['controller' => 'shows', 'action' => 'manager'], ['class' => 'btn btn-default btn-sm', 'title' => 'View All Shows']) ?>
			<?= $this->Html->link(__('By Month'), ['controller' => 'months', 'action' => 'manager'], ['class' => 'btn btn-default btn-sm', 'title' => 'View By Month']) ?>
		</div>
	</h3>
	<div class="fpageTitle">
		<h1>
			<?= h($show->dropdown->name) ?>
		</h1>
		<h2>
			<?= h($this->Switches->datetime($show->schedule)) ?>
		</h2>
		<h3>Sign-ups:
			<?= $show->signups_open ? "Open" : "Close" ?>
		</h3>
		<h3>Visible:
			<?= $show->signups_open ? "Yes" : "No" ?>
		</h3>
	</div>

	<div class="related content" style="padding-top:10px; padding-bottom:0px">
		<h4 style="border:none; margin:0;" class="tableTitle">
			<i class="fas fa-users-cog fa-l fa-fw"></i>&nbsp;
			<?= __('Performing') ?>
		</h4>
		<?php if (!empty($inshows)) : ?>
		<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col">
						<i class="fas fa-user-cog fa-l fa-fw"></i>
						<?= __('Player') ?>
					</th>
					<th scope="col">
						<?= __('Role') ?>
					</th>
				</tr>
			</thead>
			<?php foreach ($inshows as $inshows) : ?>
			<tr>
				<td>
					<?= $this->Form->postLink(__(''), ['controller' => 'Assignments', 'action' => 'remove', $inshows->id], ['class' => 'fas  fa-user-times fa-l fa-fw btnLink', 'title' => 'Delete Assignment']) ?>
				</td>
				<td scope="col" class="iconBox">
					<?= $this->Form->create(null, [
					'url' => ['controller' => 'Shows', 'action' => 'mcall', $inshows->id]
				]); ?>

					<?= $this->Form->hidden('show_id', ['value' => $inshows->show_id]); ?>
					<?= $this->Form->hidden('user_id', ['value' => $inshows->user_id]); ?>
					<?= $this->Form->hidden('callout', ['value' => 1]); ?>
					<?= $this->Form->button(__('<i class="fas fa-phone fa-l fa-fw btnLink"></i>'), ['class' => 'btnLink text-danger', 'title' => 'Called Out']) ?>
					<?= $this->Form->end() ?>


				</td>
				<td scope="col" class="iconBox">
					<?= __('') ?>
				</td>
				<td>
					<?= h($inshows->user->fullName) ?>
				</td>
				<td>
					<?php if (!empty($inshows->role_id)) : ?>
					<?= $inshows->role->name ?>
					<?php else : ?>
					<?= "none" ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
	</div>

	<div style="tableSeparator">&nbsp;</div>
	<div class="related content" style="padding-top:10px; padding-bottom:0px">
		<h4 style="border:none; margin:0;" class="tableTitle">
			<i class="fas fa-people-carry fa-l fa-fw"></i>&nbsp;
			<?= __('Support') ?>
		</h4>
		<?php if (!empty($supportshows)) : ?>
		<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
			<thead style="background-color:#fff !important;">
				<tr>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col" class="iconBox">
						<?= __('') ?>
					</th>
					<th scope="col">
						<i class="fas fa-user-cog fa-l fa-fw"></i>
						<?= __('Player') ?>
					</th>
					<th scope="col">
						<?= __('Role') ?>
					</th>
				</tr>
			</thead>
			<?php foreach ($supportshows as $supportshows) : ?>
			<tr>
				<td class="actions">
					<?= $this->Form->postLink(__(''), ['controller' => 'Assignments', 'action' => 'remove', $supportshows->id], ['class' => 'fas fa-l fa-fw fa-user-times', 'title' => 'Delete Assignment']) ?>
				</td>
				<td scope="col" class="iconBox">
					<?= $this->Form->create(null, [
					'url' => ['controller' => 'Shows', 'action' => 'mcall', $supportshows->id]
				]); ?>

					<?= $this->Form->hidden('show_id', ['value' => $supportshows->show_id]); ?>
					<?= $this->Form->hidden('user_id', ['value' => $supportshows->user_id]); ?>
					<?= $this->Form->hidden('callout', ['value' => 1]); ?>
					<?= $this->Form->button(__('<i class="fas fa-phone fa-l fa-fw"></i>'), ['class' => ' btnLink text-danger', 'title' => 'Called Out']) ?>
					<?= $this->Form->end() ?>


				</td>
				<td scope="col" class="iconBox">
					<?= __('') ?>
				</td>
				<td>
					<?= h($supportshows->user->fullName) ?>
				</td>
				<td>
					<?php if (!empty($supportshows->roles2)) : ?>
					<?= $supportshows->roles2->name ?>
					<?php else : ?>
					<?= "none" ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>


	</div>


	<?php /*
<?= $this->Html->link('Report', ['plugin' => false,'action' => 'signupreport', $show->id], ['escape'=>false]) ?>
<?= $this->Html->link('Report', ['plugin' => false,'action' => 'jump', $show->id], ['escape'=>false]) ?>


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
      <div class="panel-body"> */ ?>
	<div style="tableSeparator">&nbsp;</div>

	<div class="alert alert-success row" style="margin-bottom:30px">
		<div class="col-md-12">
			<?= $this->Form->create(null, [
			'url' => ['controller' => 'Assignments', 'action' => 'madd', $show->id], 'class' => 'form-inline'
		]); ?>
			<fieldset>
				<legend class="tablesuccess">
					<?= __('Make Assignment') ?>
				</legend>
				<?= $this->Form->hidden('show_id', ['value' => $show->id]); ?>
				<div class="form-group col-md-4">
					<?= $this->Form->control('user_id', ['label' => false, 'options' => $users, 'empty' => 'Select Player']); ?>
				</div>
				<div class="form-group col-md-4">
					<?= $this->Form->control('role_id', ['label' => false, 'options' => $roles2, 'empty' => 'Performing']); ?>
				</div>
				<div class="form-group col-md-4">
					<?= $this->Form->control('role2_id', ['label' => false, 'options' => $roles, 'empty' => 'Supporting ']); ?>
				</div>
				<div class="col-md-12">
					<?= $this->Form->button(__('Add Assignment'), ['class' => 'btn btn-success']) ?>
					<?= $this->Form->end() ?>
				</div>
			</fieldset>
		</div>
	</div>
	<?php /*     </div>
    </div>
  </div>
</div> */ ?>









	<div class="panel panel-primary">

		<div class="panel-heading">
			<h4 style="border:none; padding-top:15px; margin-bottom:0;">
				<i class="fas fa-calendar fa-s fa-fw"></i>&nbsp;Show Information</h4>
		</div>

		<div class="row">

			<div class="col-md-4">

				<fieldset>

					<legend>
						<i class="fas fa-pen-alt fa-xs fa-fw"></i>&nbsp;Show Sign Ups</legend>
					<?php if (!empty($signups)) : ?>
					<table cellpadding="0" cellspacing="0">
						<?php $i = 0 ?>
						<?php foreach ($signups as $signups) : ?>
						<?php $i++ ?>
						<tr>
							<td>
								<?= h($signups->user->fullName) ?>
							</td>
							<td>
								<?= h($signups->created->format('M jS')) ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
					<?php endif; ?>

				</fieldset>

			</div>

			<div class="col-md-4">


				<fieldset>

					<legend>
						<i class="fas fa-pen-alt fa-xs fa-fw"></i>&nbsp;Monthly Sign Ups</legend>

					<?php if (!empty($signlist)) : ?>
					<table cellpadding="0" cellspacing="0">
						<?php foreach ($signlist as $signlist) : ?>
						<tr>
							<td>
								<?= h($signlist->user['fullName']) ?>&nbsp;(&nbsp;
								<?= h($signlist->count) ?>&nbsp;)</td>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
					<?php endif; ?>

				</fieldset>

			</div>

			<div class="col-md-4">
				<fieldset>

					<legend>
						<i class="fas fa-phone fa-xs fa-fw"></i>&nbsp;Call Outs</legend>

					<?php if (!empty($callouts)) : ?>
					<table cellpadding="0" cellspacing="0">
						<?php foreach ($callouts as $callouts) : ?>
						<tr>
							<td>
								<?= h($callouts->user->fullName) ?>&nbsp;&nbsp;
								<?= $this->Form->postLink(__(''), ['controller' => 'Assignments', 'action' => 'remove', $callouts->id], ['class' => 'fas icon fa-l fa-fw fa-user-times', 'title' => 'Delete Assignment']) ?>
							</td>
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