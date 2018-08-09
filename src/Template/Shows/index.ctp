<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Show[]|\Cake\Collection\CollectionInterface $shows
 */
?>
<div class="months index large-12 medium-11 columns content">
	<h3>
		<i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;&nbsp;
		<?= __('Sign Ups') ?>&nbsp;&nbsp;
		<small style="color:white;margin-right:20px;">[ by show ]</small>
		<?= $this->Html->link(__('Shows By Month'), ['controller'=>'months','action' => 'index'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'All Shows']) ?>
	</h3>

	<?php foreach($information as $information): ?>

	<div class="alert alert-success" role="alert">
		<i class="fas fa-info-circle fa-3x fa-fw fa-pull-left"></i>
		<?= $information->page_content ?>
	</div>

	<?php endforeach; ?>

	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th class="iconBox" ;>
					<?= __('') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('dropdown_id','Show') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('month_id','Date') ?>
				</th>
				<th style="text-align: center;" scope="col">
					<?= $this->Paginator->sort('signups_open','Sign Ups Open') ?>
				</th>
				<th style="text-align: center;" scope="col">
					<?= __('Sign Ups') ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($shows as $show): ?>
			<tr>
				<td class="iconBox">
					<?= $this->Html->link(__(''), ['action' => 'view', $show->id], ['class'=>'fas fa-eye fa-l fa-fw text-success', 'title'=>'View Show']) ?>
				</td>
				<td class="iconBox">
					<?= $this->Html->link(__(''), ['controller'=>'months','action' => 'view', $show->month_id], ['class'=>'far fa-eye fa-l fa-fw text-success', 'title'=>'View Month']) ?>
				</td>
				<td class="iconBox">
					<?php if($show->signups_open == 1) : ?>
					<?= $this->Html->link(__(''), ['action' => 'signup', $show->id], ['class'=>'fas fa-pen-alt fa-l fa-fw text-success', 'title'=>'Sign Up']) ?>


					<?php endif; ?>
				</td>
				<td class="iconBox">
					<?php if($show->signups_open == 1) : ?>
					<?= $this->Form->create(null, [
                                                    'url' => ['controller' => 'Shows', 'action' => 'index'], ['class'=>'form-horizontal']
                                                ]); ?>

					<?php
                                echo $this->Form->hidden('show_id', ['value' => $show->id]);
                                echo $this->Form->hidden('user_id', ['value' => $userId]);
                                echo $this->Form->hidden('month_id', ['value' => $show->month_id]);
                            ?>
					<?= $this->Form->button(__('<i class="fas fa-pen-square fa-1x fa-fw"></i>'), ['class'=>'fas fa-pen-sqare fa-l fa-fw btnLink text-success', 'title'=>'Quick Sign Up'])?>
					<?= $this->Form->end()?>
					<?php endif; ?>
				</td>
				<td class="iconBox">
					<?php if(!empty($show->show_url)) : ?>
					<a href="<?= $show->show_url?>" title="Show URL">
						<i class="fab fa-chrome fa-l text-success fa-fw"></i>
					</a>
					<?php endif; ?>
				</td>
				<td>&nbsp;</td>
				<td>
					<?= $show->dropdown->name ?>
				</td>
				<td>
					<?= $show->schedule->format('M. j, Y g:i a') ?>
				</td>
				<td style="text-align: center;">
					<?= $show->signups_open ? "<i class='fas fa-check-circle fa-l fa-fw text-success'></i>" : '' ?>
				</td>
				<td style="text-align: center;">
					<?= $show->numberOfSignups() ? $show->numberOfSignups() : '0' ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<td colspan="10">
				<?php if (empty($show)): ?>
				<p class="text-md-center">Currently, there are no available shows</p>
				<?php endif; ?>&nbsp;

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


			</td>
		</tfoot>
	</table>
</div>