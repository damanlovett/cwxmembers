<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Month $month
 */
?>
<div class="months index large-12 medium-11 columns content panel panel-primary">
            <div class="panel-heading">
                <span class="panel-title">
                    <?php echo __('Sign In'); ?>
                </span>
                <span class="panel-title-right">
                    <?php echo $this->Html->link(__('Sign Up', true), ['controller'=>'Users', 'action'=>'register', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default']); ?>
                </span>
            </div>
            <div class="panel-body">


    <?= $this->Form->create($month) ?>
    <fieldset>
        <legend><?= __('Add Month') ?></legend>
        <?php
            echo $this->Form->control('title', ['type' => 'select', 'options' => $this->Switches->selectMonth()]);
            echo $this->Form->control('year', ['type' => 'select', 'options' => $this->Switches->selectYear()]);
            echo $this->Form->control('first_friday');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
