<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->assign('title', "My Profile");?>
<div class="users view large-12 medium-11 columns content">
    <h3><i class="fas fa-user fa-lx fa-fw"></i>&nbsp;&nbsp;<?= h($user->first_name."'s Profile") ?><span class="pull-right">
            <?php echo $this->Html->link(__('Edit', true), ['action'=>'editProfile', 'plugin'=>'usermgmt'], ['class'=>'btn btn-default btn-sm']); ?>
        </span></h3>



    <div class="profile">
                                <img alt="<?php echo h($user['first_name'].' '.$user['last_name']); ?>" src="<?php echo $this->Image->resize('library/'.IMG_DIR, $user['photo'], 200, null, true);?>">
    </div>
    <table class="table table-striped table-user" cellpadding="0" cellspacing="0">
        <tr>
            <td class="cellHeader" scope="row"><?= __('First Name') ?></td>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Last Name') ?></td>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Username') ?></td>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Email') ?></td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('System Group') ?></td>
            <td><?= $user->has('user_group') ? $user->user_group->name : '' ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Club Standing') ?></td>
            <td><?= $user->has('club_standing') ? $user->club_standing->title : "<span class='text-muted'>Not Assigned</span>" ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Active') ?></td>
            <td><?= $user->active ? "Yes" : "No" ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Birthday') ?></td>
            <td><?= $user->has('bday') ? $user->bday : "<span class='text-muted'>Please Update</span>" ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Last Login') ?></td>
            <td><?= h($user->last_login) ?></td>
        </tr>
    </table>

    <hr />



</div>
</div>
