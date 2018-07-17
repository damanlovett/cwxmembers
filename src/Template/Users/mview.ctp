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
                <td><?= $userDetails->referee ? "<span class='text-success'>Yes</span>" : "No" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Host') ?></td>
                <td><?= $userDetails->host ? "<span class='text-success'>Yes</span>" : "No" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Voice') ?></td>
                <td><?= $userDetails->voice ? "<span class='text-success'>Yes</span>" : "No" ?></td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('Member Standing') ?></td>
          <?php /* Need to figure out how to out put      <td><?= $userDetails->MemberStandings['title'] ?> </td>*/?>
                <td>TBA</td>
            <tr>
                <td class="cellHeader" scope="col"><?= __('ABC Training') ?></td>
                <td><?= $userDetails->abc ? "<span class='text-success'>Yes</span>" : "<span class='text-muted'>Not Completed</span>" ?>


<!-- Small modal -->

<?php echo $this->Html->link('','/#', ['data-toggle'=>'modal', 'data-target'=>".bs-example-modal-lg",'class'=>'fas icon fa-lg  fa-fw text-success', 'title'=>'title']); ?>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
ABC CERTIFICATION:
As you all know by now, we had a visit from the ALE (awww) a few weeks ago and we need to make sure that anyone who works selling alcohol at our concession has their ABC Certification.  If you have not yet been certified, here is what you need to do:
Go to the ABC Website
Click on “Register for Seller/Server Training Program”
Click on the “Search for a business that I represent that currently holds permits OR has applied for permits” radio button
Type “Worx Comedy Theatre” in the “Trade Name” field and click on the “Search” button.
Select the club, register on the site and take the test
When you are done, you’ll be able to download a PDF copy of the ABC Certificate.  Please e-mail your certification to myself, Ashley and Michael Teague.    </div>
  </div>
</div>

                </td>
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
