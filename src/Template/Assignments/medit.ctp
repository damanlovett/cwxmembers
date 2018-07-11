<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignment $assignment
 */
?>
<div class="assignment view large-12 medium-11 columns content">
<h3><i class="fas fa-calendar fa-1x fa-fw"></i><?= __('Edit Assignment') ?></h3>
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <?php
            echo $this->Form->hidden('show_id', ['value' => $showid]);
           // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
         //   echo $this->Form->control('signup_id', ['options' => $signups, 'empty' => true]);
        //    echo $this->Form->control('role_id');
         //   echo $this->Form->control('role2_id', ['options' => $roles, 'empty' => true]);
        //    echo $this->Form->control('callout');
      //      echo $this->Form->control('notes');?>

                <div class="row">
                <div class="col-md-4">
                    <?= $this->Form->control('user_id', ['label'=>'Player','options' => $users, 'empty' => true]);?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('role_id', ['label' => 'Performing', 'empty' => '---']);?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('role2_id', ['label' => 'Supporting Role', 'options' => $roles, 'empty' => '---']);?>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <?= $this->Form->control('notes', ['label' => 'Notes', 'type' => 'textarea', 'class'=> 'form-control']);?>
                </div>
            </div>
                <div class="row">
                <div class="col-md-12">
                            <?= $this->Form->control('callout');?>

                </div>
            </div>




                <?= $this->Form->button(__('Edit Assignment'), ['class' => 'btn btn-success']) ?>
                                <?= $this->Form->end() ?>

    </fieldset>
</div>
