<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->assign('title', "Member"); ?>
<div class="users view large-12 medium-11 columns content">
    <h3>
        <i class="fas fa-user fa-lx fa-fw"></i>&nbsp;&nbsp;
        <?= h($user->first_name . "'s Profile") ?>
        <span class="pull-right">
            <?php echo $this->Html->link(__('Edit', true), ['action' => 'editProfile', 'plugin' => 'usermgmt'], ['class' => 'btn btn-default btn-sm']); ?>
        </span>
    </h3>



    <div class="profile">
        <img alt="<?php echo h($user['first_name'] . ' ' . $user['last_name']); ?>" src="<?php echo $this->Image->resize('library/' . IMG_DIR, $user['photo'], 200, null, true); ?>">
    </div>
    <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('First Name') ?>
            </td>
            <td>
                <?= h($user->first_name) ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Last Name') ?>
            </td>
            <td>
                <?= h($user->last_name) ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Username') ?>
            </td>
            <td>
                <?= h($user->username) ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Email') ?>
            </td>
            <td>
                <?= h($user->email) ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Club Standing') ?>
            </td>
            <td>
                <?= $var['club_standing']['title'] ?>
                <?= $user->has('club_standing') ? $user->club_standing->title : "<span class='text-muted'>Not Assigned</span>" ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Active') ?>
            </td>
            <td>
                <?= $user->active ? "Yes" : "No" ?>
            </td>
        </tr>
        <tr>
            <td class="cellHeader" scope="row">
                <?= __('Gender') ?>
            </td>
            <td>
                <?= $user->gender ? $user->gender : "<span class='text-muted'>Please Update</span>" ?>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Birthday') ?>
                    </td>
                    <td>
                        <?= $user->has('bday') ? $this->Switches->date($user->bday) : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Nickname') ?>
                    </td>
                    <td>
                        <?= (!empty($var['user_detail']['nickname'])) ? $var['user_detail']['nickname'] : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Jersey') ?>
                    </td>
                    <td>
                        <?= (!empty($var['user_detail']['jersey'])) ? $var['user_detail']['jersey'] : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Shirt Size') ?>
                    </td>
                    <td>
                        <?= $user->has('shirt') ? $user->shirt : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Address') ?>
                    </td>
                    <td>
                        <?= (!empty($var['user_detail']['location'])) ? $var['user_detail']['location'] : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Phone') ?>
                    </td>
                    <td>
                        <?= (!empty($var['user_detail']['cellphone'])) ? $var['user_detail']['cellphone'] : "<span class='text-muted'>Please Update</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td class="cellHeader" scope="row">
                        <?= __('Last Login') ?>
                    </td>
                    <td>
                        <?= $this->Switches->dateTime($user->last_login) ?>
                    </td>
                </tr>
    </table>

    <hr />



</div>