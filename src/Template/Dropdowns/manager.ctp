<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dropdown[]|\Cake\Collection\CollectionInterface $dropdowns
 */
?>
<?php $this->assign('title','Table Manger');?>
<div class="dropdowns index large-12 medium-11 columns content">
	<h3>
		<i class="fas fa-table fa-l fa-fw"></i>&nbsp;&nbsp;
		<?= __('Table Manager') ?>&nbsp;&nbsp;
	</h3>


	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">&nbsp;</h1>
			<span class="pull-left">
				<!-- Nav tabs -->
				<ul class="nav panel-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#shows" aria-controls="shows" role="tab" data-toggle="tab">Shows</a>
					</li>
					<li role="presentation">
						<a href="#players" aria-controls="players" role="tab" data-toggle="tab">Players</a>
					</li>
					<li role="presentation">
						<a href="#clubs" aria-controls="clubs" role="tab" data-toggle="tab">Club Standings</a>
					</li>
					<li role="presentation">
						<a href="#members" aria-controls="members" role="tab" data-toggle="tab">Member Standings</a>
					</li>
					<li role="presentation">
						<a href="#shirts" aria-controls="shirts" role="tab" data-toggle="tab">Shirts</a>
					</li>
				</ul>
			</span>
		</div>
		<div class="panel-body">

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="shows">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th scope="col">
									<?= $this->Paginator->sort('name') ?>
								</th>
								<th scope="col" class="actions">
									<?= __('created') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($shows as $show): ?>
							<tr>
								<td>
									<?= $this->Html->link(__('View'), ['action' => 'view', $show->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?>
								</td>
								<td>
									<?= $this->Html->link(__('View'), ['action' => 'view', $show->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?>
								</td>
								<td>
									<?= h($show->name) ?>
								</td>
								<td>
									<?= h($show->created) ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="players">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">
									<?= $this->Paginator->sort('name') ?>
								</th>
								<th scope="col" class="actions">
									<?= __('Actions') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($players as $player): ?>
							<tr>
								<td>
									<?= h($player->name) ?>
								</td>
								<td class="actions">
									<?= $this->Html->link(__('View'), ['action' => 'view', $player->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $player->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="clubs">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">
									<?= $this->Paginator->sort('name') ?>
								</th>
								<th scope="col" class="actions">
									<?= __('Actions') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($clubs as $club): ?>
							<tr>
								<td>
									<?= h($club->title) ?>
								</td>
								<td class="actions">
									<?= $this->Html->link(__('View'), ['action' => 'view', $club->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $club->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="members">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">
									<?= $this->Paginator->sort('name') ?>
								</th>
								<th scope="col" class="actions">
									<?= __('Actions') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member): ?>
							<tr>
								<td>
									<?= h($member->title) ?>
								</td>
								<td class="actions">
									<?= $this->Html->link(__('View'), ['action' => 'view', $member->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $member->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" id="shirts">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">
									<?= $this->Paginator->sort('name') ?>
								</th>
								<th scope="col" class="actions">
									<?= __('Actions') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($shirts as $shirt): ?>
							<tr>
								<td>
									<?= h($shirt->name) ?>
								</td>
								<td class="actions">
									<?= $this->Html->link(__('View'), ['action' => 'view', $shirt->id]) ?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $shirt->id]) ?>
									<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shirt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

				</div>
			</div>

		</div>


	</div>
</div>