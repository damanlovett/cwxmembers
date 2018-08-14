<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>

<div class="months view large-12 medium-12 columns content">
	<h3>
		<i class="fas fa-calendar-alt fa-1 fa-fw"></i>&nbsp;&nbsp;
		<?= $month->title." ".$month->year; ?>
		<div class="btn-toolbar pull-right" role="toolbar" aria-label="...">
			<?= $this->Html->link(__('All Shows'), ['controller'=>'shows', 'action' => 'manager'], ['class'=>'btn btn-default btn-sm', 'title'=>'View All Shows']) ?>
			<?= $this->Html->link( 'By Month', ['controller'=>'months', 'action' => 'manager'], ['class'=>'btn btn-default btn-sm', 'title'=>'View By Month']) ?>

			<a class="btn btn-success btn-sm" role="button" data-toggle="collapse" href="#collapseAddSection" aria-expanded="false" aria-controls="collapseAddSection">
				<i class="fas fa-plus fa-1 fa-fw"></i>&nbsp;Show / Practice
			</a>
		</div>
	</h3>

	<?php foreach($information as $information): ?>

	<div class="alert alert-success" role="alert">
		<p>
			<strong>Information displayed on sign up pages: </strong>
		</p>
		<br />
		<div class="well well-sm" style="background-color:white;">
			<i class="fas fa-info-circle fa-2x fa-fw fa-pull-left"></i>
			<?= $information->page_content ?>
			<?= $this->Html->link(__('Edit Text'), ['action' => 'add'], ['class'=>'btn btn-default btn-sm pull-left', 'title'=>'Edit Text', 'disabled'=>true]) ?>
			<div style="clear: both;"></div>
		</div>

	</div>

	<div class="row collapse" id="collapseAddSection">
		<div class="col-md-6 ">


			<!-- Form 1 -->
			<fieldset class="miniForm ">
				<legend>Add Show</legend>

				<?= $this->Form->create(null, [
                                'url' => ['controller' => 'Months', 'action' => 'mview', $month->id], ['class'=>'form-inline']
                            ]); ?>
				<div class="um-form-row form-group ">
					<div class="col-md-6 ">
						<?php
            echo $this->Form->hidden('month_id', ['value' => $month->id]);
            echo $this->Form->control('dropdown_id', ['label'=>'Type of Show','options' => $dropdowns, 'empty' => true]);
        ?>
					</div>
					<div class="col-md-6 ">
						<?php echo $this->Form->control('schedule', ['type'=>'text', 'label'=>'Date of Show', 'div'=>false, 'size' => 3, 'class'=>'form-control datetimepicker']); ?>
					</div>
				</div>
				<div class="um-form-row form-group ">
					<div class="col-md-12 ">
						<?php echo $this->Form->control('notes', ['type'=>'textarea', 'label'=>false, 'placeholder'=>'Enter show information','class'=> 'form-control textarea']); ?>
					</div>
				</div>
				<div class="um-form-row form-group " style="margin-left:20px ">
					<div class="row ">
						<div class="col-sm-3 ">
							<?php echo $this->Form->control('ref_needed', ['label'=>'Ref Needed', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
						</div>
						<div class="col-sm-3 ">
							<?php echo $this->Form->control('voice_needed', ['label'=>'Voice Needed', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
						</div>
						<div class="col-sm-3 ">
							<?php echo $this->Form->control('host_needed', ['label'=>'Host Needed', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
						</div>
						<div class="col-sm-3 ">
							<?php echo $this->Form->control('players_needed'); ?>
						</div>
					</div>
				</div>
				<div class="um-form-row form-group " style="margin-left:20px ">
					<div class="col-sm-6 ">
						<?php echo $this->Form->control('signups_open', ['label'=>'Sign Ups Open', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
					</div>
					<div class="col-md-6 ">
						<?php echo $this->Form->control('visible', ['label'=>'Visble', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
					</div>
				</div>
				<hr />
				<div class="um-form-row form-group ">
					<div class="col-md-12 ">
						<?= $this->Form->button(__('Add Show'), ['class' => 'btn btn-success']) ?>
						<?= $this->Form->end() ?>
			</fieldset>

			<!-- End of Form 1 -->






			</div>

			<div class="col-md-6 ">



				<!-- Form 2 -->
				<fieldset class="miniForm ">
					<legend>Add Practice</legend>

					<?= $this->Form->create(null, [
                                'url' => ['controller' => 'Practices', 'action' => 'madd', $month->id], ['class'=>'form-inline']
                            ]); ?>
					<?= $this->Form->hidden('month_id', ['value' => $month->id]); ?>

					<div class="um-form-row form-group ">
						<div class="col-md-4 ">
							<?= $this->Form->control('title');?>
						</div>
						<div class="col-md-4 ">
							<?= $this->Form->control('schedule', ['type'=>'text', 'label'=>'Date of Practice', 'div'=>false, 'size' => 3, 'class'=>'form-control datetimepicker']); ?>
						</div>
						<div class="col-md-4 ">
							<?= $this->Form->control('leader');?>
						</div>
					</div>

					<div class="um-form-row form-group ">
						<div class="col-md-12 ">
							<?= $this->Form->control('description', ['type'=>'textarea', 'label'=>false, 'placeholder'=>'Enter show information', 'class'=> 'form-control textarea']); ?>
						</div>
					</div>
					<div class="um-form-row form-group " style="margin-left:20px ">
						<div class="col-md-6 ">
							<?= $this->Form->control('visible', ['label'=>'Visble', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
						</div>
						<div class="col-md-6 ">
							<?= $this->Form->control('open', ['label'=>'Open', 'type'=>'checkbox', 'class'=> 'form-control my_checkbox']); ?>
						</div>
					</div>
					<div class="um-form-row form-group " style="margin-left:20px ">
						<div class="row " style="height: 330px ">&nbsp;</div>
					</div>
					<hr />
					<div class="um-form-row form-group ">
						<div class="col-md-12 ">
							<?= $this->Form->button(__('Add Practice'), ['class' => 'btn btn-success']) ?>
							<?= $this->Form->end() ?>
						</div>
					</div>

				</fieldset>

				<!-- End Form 2 -->

			</div>

			</div>
			<!-- End of Add section -->




			<?php endforeach; ?>







			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">&nbsp;</h1>
					<span class="pull-left">

						<!-- Nav tabs -->
						<ul class="nav panel-tabs" role="tablist">
							<li role="presentation" class="active">

								<a href="#shows" aria-controls="shows" role="tab" data-toggle="tab">
									<i class="fas fa-cog fa-1x fa-fw"></i>&nbsp;&nbsp;Shows</a>
							</li>
							<li role="presentation">

								<a href="#practices" aria-controls="practices" role="tab" data-toggle="tab">
									<i class="fas fa-chalkboard fa-1x fa-fw"></i>&nbsp;&nbsp;Practices</a>
							</li>
						</ul>
					</span>
				</div>

				<div class="panel-body">
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="shows">
							<?php if (!empty($month->shows)): ?>
							<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
								<thead>
									<th class="iconBox ">
										<?= __('') ?>
									</th>
									<th class="iconBox ">
										<?= __('') ?>
									</th>
									<th class="iconBox ">
										<?= __('') ?>
									</th>
									<th class="iconBox ">
										<?= __('') ?>
									</th>
									<th scope="col ">
										<i class="fas fa-cog fa-1x fa-fw"></i>
										<?= __( 'Show') ?>
									</th>
									<th scope="col ">
										<i class="fas fa-clock fa-1x fa-fw"></i>
										<?= __('Date') ?>
									</th>
									<th style="text-align: center " scope="col ">
										<i class="fas fa-pen-alt fa-1x fa-fw"></i>
										<?= __('Sign Ups') ?>
									</th>
									<th style="text-align: center " scope="col ">
										<?= __('Visible') ?>
									</th>
									<th style="text-align: center " scope="col ">
										<?= __('Sign Ups Open') ?>
									</th>
								</thead>
								<?php foreach ($month->shows as $shows): ?>
								<tr>
									<td>
										<?= $this->Html->link(__(''), ['controller' => 'Shows', 'action' => 'mview', $shows->id], ['class'=>'fas fa-plus fa-l  fa-fw text-success', 'title'=>'Make Assignment']) ?>
									</td>
									<td>
										<?= $this->Html->link(__(''), ['controller' => 'Shows', 'action' => 'view', $shows->id], ['class'=>'fas fa-eye fa-l  fa-fw text-success', 'title'=>'View Show']) ?>
									</td>
									<td>
										<?= $this->Html->link(__(''), ['controller' => 'Shows', 'action' => 'edit', $shows->id], ['class'=>'fas fa-edit fa-l  fa-fw text-success', 'title'=>'Edit Show']) ?>
									</td>
									<td>
										<?= $this->Form->postLink(__(''), ['controller' => 'Shows', 'action' => 'remove', $shows->id], ['confirm' => __('Are you sure you want to delete this show?', $shows->id), 'class'=>'fas fa-trash-alt fa-l  fa-fw text-danger', 'title'=>'Delete Show']) ?>
									</td>
									<td>
										<?= h($shows->Dropdowns['name']) ?>
									</td>
									<td>
										<?= h($this->Switches->datetime($shows->schedule)) ?>
									</td>
									<td style="text-align: center ">
										<?= $show->numberOfSignups() ?>

										<?php if(!empty($show->players_needed)):?>

										need


										<?= $show->players_needed ?>
										<?php if($show->numberOfSignups() > $show->players_needed || $show->numberOfSignups() == $show->players_needed) echo "<i class='fas fa-check fa-l fa-fw text-success'></i>";  ?>
										<?php endif ;?>
									</td>
									<td style="text-align: center ">
										<?= $shows->visible ? "<i class='fas fa-check-circle fa-l fa-fw text-success'
	 text-success '></i>" : ' ' ?>
									</td>
									<td style="text-align: center">
										<?= $shows->signups_open ? "<i class='fas fa-check-circle
	 fa-l fa-fw text-success ' text-success'>
		</i>" : '' ?>
									</td>
								</tr>
								<?php endforeach; ?>
								<tfoot>
									<td colspan="9">&nbsp;</td>
								</tfoot>
							</table>
							<?php endif; ?>
						</div>
						<div role="tabpanel" class="tab-pane" id="practices">
							<?php if (!empty($month->practices)): ?>
							<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
								<thead>
									<th scope="col">
										<i class="fas fa-chalkboard fa-1x fa-fw"></i>
										<?= __('Practice') ?>
									</th>
									<th scope="col">
										<i class="fas fa-clock fa-1x fa-fw"></i>
										<?= __('Date') ?>
									</th>
									<th scope="col">
										<i class="fas fa-chalkboard-teacher fa-1x fa-fw"></i>
										<?= __('Leader') ?>
									</th>
								</thead>
								<?php foreach ($month->practices as $practices): ?>
								<tr>
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
									<td colspan="3">&nbsp;</td>
								</tfoot>
							</table>
							<?php endif; ?>

						</div>
					</div>

				</div>
			</div>
		</div>