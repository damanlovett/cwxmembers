<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
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
            <td><?= $user->has('club_standing') ? $user->club_standing->title : '' ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Active') ?></td>
            <td><?= $user->active ? "Yes" : "No" ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Bday') ?></td>
            <td><?= h($user->bday) ?></td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row"><?= __('Last Login') ?></td>
            <td><?= h($user->last_login) ?></td>
        </tr>
    </table>

    <hr />


    <div class="related">
        <h4><?= __('Membership') ?></h4>
        <?php if (!empty($user->user_details)): ?>
    <table class="table table-striped" cellpadding="0" cellspacing="0">

            <?php foreach ($user->user_details as $userDetails): ?>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Nickname') ?></td>
                <td><?= h($userDetails->nickname) ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Jersey') ?></td>
                <td><?= h($userDetails->jersey) ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Starting Year') ?></td>
                <td><?= $userDetails->has('starting_year')? $userDetails->starting_year->format('Y') : '' ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Referee') ?></td>
                <td><?= $userDetails->referee ? "<span class='text-success'>Yes</span>" : "<span class='text-muted'>Not Completed</span>" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Host') ?></td>
                <td><?= $userDetails->host ? "<span class='text-success'>Yes</span>" : "<span class='text-muted'>Not Completed</span>" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Voice') ?></td>
                <td><?= $userDetails->voice ? "<span class='text-success'>Yes</span>" : "<span class='text-muted'>Not Completed</span>" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Member Standing Id') ?></td>
          <?php /* Need to figure out how to out put      <td><?= $userDetails->MemberStandings['title'] ?> </td>*/?>
                <td>TBA</td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('ABC Training') ?></td>
                <td><?= $userDetails->abc ? "<span class='text-success'>Yes</span>" : "<span class='text-muted'>Not Completed</span>" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Address') ?></td>
                <td><?= h($userDetails->location) ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Phone') ?></td>
                <td><?= h($userDetails->cellphone) ?></td>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
