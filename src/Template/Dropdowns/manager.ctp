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
    <?= $this->Form->create($dropdown) ?>
    <fieldset>
        <legend><?= __('Add Dropdown') ?></legend>
        <?php $options = ['shows'=>'Shows','players'=>'Players','shirts'=>'Shirt Sizes'];?>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->select('type',$options);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class=" panel-title ">&nbsp;</h1>
            <span class="pull-left ">
                <!-- Nav tabs -->
                <ul class="nav panel-tabs">
                    <li class="active ">
                        <a href="#tab1" role="tab " data-toggle="tab">Shows</a>
                    </li>
                    <li>
                        <a href="#tab2" role="tab" data-toggle="tab">Players</a>
                    </li>
                    <li style="display:none;">
                        <a href="#tab3" role="tab" data-toggle="tab">Club Standings</a>
                    </li>
                    <li style="display:none;">
                        <a href="#tab4" role="tab" data-toggle="tab">Member Standings</a>
                    </li>
                    <li>
                        <a href="#tab5" role="tab" data-toggle="tab">Shirts</a>
                    </li>
                </ul>
            </span>
        </div>
        <div class="panel-body ">

            <!-- Tab panes -->
            <div class="tab-content ">
                <div class="tab-pane active " id="tab1">
                    <table class="table table-striped table-bordered " cellpadding="0 " cellspacing="0 "
                        style="width:50% ">
                        <thead>
                            <tr>
                                <th class="iconBox2 ">&nbsp;&nbsp;</th>
                                <th scope="col ">
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shows as $show): ?>
                            <tr>
                                <td class="iconBox2 ">
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $show->id], ['class'=>'fas fa-edit fa-l fa-fw text-success', 'title'=>'Sign Up']) ?>
                                    <?php /* <?= $this->Html->link(__('Edit'), ['action' => 'edit', $show->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $show->id], ['confirm' => __('Are you sure you want to delete # {0}?', $show->id)]) ?>
                                    */?>
                                </td>
                                <td>
                                    <?= h($show->name) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane " id="tab2">

                    <table class="table table-striped table-bordered " cellpadding="0 " cellspacing="0 "
                        style="width:50% ">
                        <thead>
                            <tr>
                                <th class="iconBox2 ">&nbsp;&nbsp;</th>
                                <th scope="col ">
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($players as $player): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__(''), ['action' => 'view', $player->id], ['class'=>'fas fa-edit fa-l fa-fw text-success', 'title'=>'Edit']) ?>
                                    <?php /* <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?>
                                    */?>
                                </td>
                                <td>
                                    <?= h($player->name) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane " id="tab3">
                    <table class="table table-striped table-bordered " cellpadding="0 " cellspacing="0 "
                        style="width:50% ">
                        <thead>
                            <tr>
                                <th class="iconBox2 ">&nbsp;&nbsp;</th>

                                <th scope="col ">
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clubs as $club): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__(''), ['controller'=>'club-standings','action' => 'edit', $club->id], ['class'=>'fas fa-edit fa-l fa-fw text-success', 'title'=>'Edit']) ?>
                                    <?php /* <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?>
                                    */?>
                                </td>
                                <td>
                                    <?= h($club->title) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel " class="tab-pane " id="tab4">
                    <table class="table table-striped table-bordered " cellpadding="0 " cellspacing="0 "
                        style="width:50% ">

                        <thead>
                            <tr>
                                <th class="iconBox2 ">&nbsp;&nbsp;</th>
                                <th scope="col ">
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($members as $member): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__(''), ['controller'=>'member-standings', 'action' => 'edit', $member->id], ['class'=>'fas fa-edit fa-l fa-fw text-success', 'title'=>'Edit']) ?>
                                    <?php /* <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                                    */?>
                                </td>
                                <td>
                                    <?= h($member->title) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane " id="tab5">
                    <table class="table table-striped table-bordered " cellpadding="0 " cellspacing="0 "
                        style="width:50% ">
                        <thead>
                            <tr>
                                <th class="iconBox2 ">&nbsp;&nbsp;</th>
                                <th scope="col ">
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($shirts as $shirt): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(__(''), ['action' => 'edit', $shirt->id], ['class'=>'fas fa-edit fa-l fa-fw text-success', 'title'=>'Edit']) ?>
                                    <?php /* <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                                    */?>
                                </td>

                                <td>
                                    <?= h($shirt->name) ?>
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