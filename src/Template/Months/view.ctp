<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<?php $this->assign('title', $month->title);?>
<div class="months view large-12 medium-12 columns content">
	<h3>
		<i class="fas fa-calendar-alt fa-1x fa-fw"></i>&nbsp;&nbsp;
		<?= $month->title." ".$month->year; ?>
		<div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
			<?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'btn btn-default btn-sm pull-right', 'title'=>'Back to Month']) ?>
		</div>
	</h3>

	<?php foreach($information as $information): ?>

	<div class="alert alert-success" role="alert">
		<i class="fas fa-info-circle fa-3x fa-fw fa-pull-left"></i>
		<?= $information->page_content ?>
	</div>

	<?php endforeach; ?>


	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title">&nbsp;</h1>
			<span class="pull-left">
				<!-- Tabs -->
				<ul class="nav panel-tabs">
					<li class="active">
						<a href="#tab1" data-toggle="tab">
							<i class="fas fa-cog fa-l fa-fw"></i>&nbsp;&nbsp;Shows</a>
					</li>
					<li>
						<a href="#tab2" data-toggle="tab">
							<i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;&nbsp;Sign Ups</a>
					</li>
					<li>
						<a href="#tab3" data-toggle="tab">
							<i class="fas fa-chalkboard fa-l fa-fw"></i>&nbsp;&nbsp;Practices</a>
					</li>
				</ul>
			</span>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">

					<?php if (!empty($month->shows)): ?>
					<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
						<thead>
							<th class="iconBox">
								<?= __('') ?>
							</th>
							<th class="iconBox">
								<?= __('') ?>
							</th>
							<th class="iconBox">
								<?= __('') ?>
							</th>
							<th class="iconBox">
								<?= __('') ?>
							</th>
							<th scope="col">
								<i class="fas fa-cog fa-l fa-fw"></i>&nbsp;
								<?= __('Show') ?>
							</th>
							<th scope="col">
								<i class="fas fa-clock fa-l fa-fw"></i>&nbsp;
								<?= __('Date') ?>
							</th>
							<th style="text-align: center" scope="col">
								<i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
								<?= __('Sign Ups') ?>
							</th>
							<th style="text-align: center" scope="col">
								<i class="fas fa-people-carry fa-l fa-fw"></i>&nbsp;
								<?= __('Needs') ?>
							</th>
						</thead>
						<?php foreach ($month->shows as $shows): ?>
						<tr>
							<td>
								<?php if($shows->visible == 1) : ?>
								<?= $this->Html->link(__(''), ['controller'=>'Shows', 'action' => 'view', $shows->id], ['class'=>'fas fa-eye fa-l fa-fw text-success', 'title'=>'View Show'])?>
								<?php endif; ?>
							</td>
							<td>
								<?php if($shows->visible == 1) : ?>
								<?= $this->Html->link(__(''), ['controller'=>'Shows', 'action' => 'signup', $shows->id], ['class'=>'fas fa-pen-alt fa-l fa-fw text-success', 'title'=>'View and Sign Up'])?>
								<?php endif; ?>
							</td>
							<td>
								<?php if($shows->signups_open == 1 && $shows->visible == 1) : ?>
								<?= $this->Form->create(null, [
                                                    'url' => ['controller' => 'Months', 'action' => 'view', $month->id], ['class'=>'form-horizontal']
                                                ]); ?>

								<?php
                                echo $this->Form->hidden('show_id', ['value' => $shows->id]);
                                echo $this->Form->hidden('user_id', ['value' => $userId]);
                                echo $this->Form->hidden('month_id', ['value' => $shows->month_id]);
                            ?>
								<?= $this->Form->button(__('<i class="fas fa-pen-square fa-1x fa-fw"></i>'), ['class'=>'fas fa-pen-sqare fa-l fa-fw btnLink text-success', 'title'=>'Quick Sign Up'])?>
								<?= $this->Form->end()?>
								<?php endif; ?>
							</td>
							<td>
								<?php if (!empty($shows->show_url)) : ?>
								<a href='<?= $shows->show_url ?>' class="fab fa-chrome fa-l fa-fw text-success"
								 target="_blank" title='Show URL'></a>
								<?php endif;?>
							</td>
							<td>
								<?= h($shows->Dropdowns['name']) ?>
							</td>
							<td>
								<?= h($shows->DisplayName) ?>
							</td>
							<td style="text-align: center;">
								<?= $shows->numberOfSignups() ?>

								<?php if(!empty($shows->players_needed)):?>

								need


								<?= $shows->players_needed ?>
								<?php if($shows->numberOfSignups() > $shows->players_needed || $shows->numberOfSignups() == $shows->players_needed) echo "<i class='fas fa-check fa-l fa-fw text-success'></i>";  ?>
								<?php endif ;?>
							</td>
							<td style="text-align: center;">
								<?= $shows->ref_needed ? '   '.$this->Html->image('ref.png', ['title'=>'need a ref']).'  ' : $this->Html->image('need.png').'  ' ?>
								<?= $shows->voice_needed ? '   '.$this->Html->image('voice.png', ['title'=>'need a voice']).'  ' : '   '.$this->Html->image('need.png').'  '?>
								<?= $shows->host_needed ? '   '.$this->Html->image('host.png', ['title'=>'need a host']) : '   '.$this->Html->image('need.png') ?>
							</td>
						</tr>
						<?php endforeach; ?>
						<tfoot>
							<td colspan="8">
								<div class="paginator" style="display:none;">
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
					<?php endif; ?>
					<?php if (empty($month->shows)) { echo "<div style='text-align: center; margin-top:25px; min-height:300px'>Currently, there are no shows for sign ups or viewing.  Please check back later.</div>"; } ?>

				</div>
				<div class="tab-pane" id="tab2">

					<?php if (!empty($signups)): ?>
					<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
						<thead>
							<th scope="col">
								<i class="fas fa-cog fa-l fa-fw"></i>&nbsp;
								<?= __('Show') ?>
							</th>
							<th scope="col">
								<i class="fas fa-clock fa-l fa-fw"></i>&nbsp;
								<?= __('Date')?>
							</th>
							<th scope="col">
								<i class="fas fa-user-circle fa-l fa-fw"></i>&nbsp;
								<?= __('Player')?>
							</th>
							<th scope="col">
								<i class="fas fa-pen-alt fa-l fa-fw"></i>&nbsp;
								<?= __('Signed Up On')?>
							</th>
						</thead>
						<?php foreach ($signups as $signups): ?>
						<tr>
							<td>
								<?= h($signups->show->dropdown['name']) ?>
							</td>
							<td>
								<?= h($signups->show->DisplayName) ?>
							</td>
							<td>
								<?= h($signups->user->fullName) ?>
							</td>
							<td>
								<?= h($this->Switches->datetime($signups->created)) ?>
							</td>
						</tr>
						<?php endforeach; ?>
						<tfoot>
							<td colspan="4">
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
					<?php endif; ?>


				</div>
				<div class="tab-pane" id="tab3">

					<?php if (!empty($month->practices)): ?>
					<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
						<thead>
							<th style="width:30px;">
								<?= __('') ?>
							</th>
							<th scope="col">
								<i class="fas fa-chalkboard fa-l fa-fw"></i>&nbsp;
								<?= __('Practice') ?>
							</th>
							<th scope="col">
								<i class="fas fa-clock fa-l fa-fw"></i>&nbsp;
								<?= __('Date') ?>
							</th>
							<th scope="col">
								<i class="fas fa-chalkboard-teacher fa-l fa-fw"></i>&nbsp;
								<?= __('Leader') ?>
							</th>
						</thead>
						<?php foreach ($month->practices as $practices): ?>
						<tr>
							<td>
								<?= $this->Html->link(__(''), ['controller'=>'practices','action' => 'view', $practices->id], ['class'=>'fas fa-eye fa-l fa-fw text-success', 'title'=>'View Practice']) ?>
							</td>
							<td>
								<?= h($practices->title) ?>
							</td>
							<td>
								<?= h($this->Switches->datetime($practices->schedule)) ?>
							</td>
							<td>
								<?= h($practices->leader) ?>
							</td>
						</tr>
						<?php endforeach; ?>
						<tfoot>
							<td colspan="4">&nbsp;</td>
						</tfoot>
					</table>
					<?php endif; ?>
					<?php if (empty($month->practices)) { echo "<div style='text-align: center; margin-top:25px; min-height:300px'>Currently, there are no practices scheduled for this month.  Please check back later.</div>"; } ?>


				</div>
			</div>
		</div>
	</div>

</div>