<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Club Standings'), ['controller' => 'ClubStandings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club Standing'), ['controller' => 'ClubStandings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Checkins'), ['controller' => 'Checkins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Checkin'), ['controller' => 'Checkins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Login Tokens'), ['controller' => 'LoginTokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login Token'), ['controller' => 'LoginTokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Email Recipients'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email Recipient'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Signups'), ['controller' => 'Signups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Signup'), ['controller' => 'Signups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Activities'), ['controller' => 'UserActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Activity'), ['controller' => 'UserActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Contacts'), ['controller' => 'UserContacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Contact'), ['controller' => 'UserContacts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Email Recipients'), ['controller' => 'UserEmailRecipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Recipient'), ['controller' => 'UserEmailRecipients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Email Signatures'), ['controller' => 'UserEmailSignatures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Signature'), ['controller' => 'UserEmailSignatures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Email Templates'), ['controller' => 'UserEmailTemplates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email Template'), ['controller' => 'UserEmailTemplates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Socials'), ['controller' => 'UserSocials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social'), ['controller' => 'UserSocials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $user->has('user_group') ? $this->Html->link($user->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($user->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Club Standing') ?></th>
            <td><?= $user->has('club_standing') ? $this->Html->link($user->club_standing->title, ['controller' => 'ClubStandings', 'action' => 'view', $user->club_standing->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($user->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($user->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Verified') ?></th>
            <td><?= $this->Number->format($user->email_verified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($user->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($user->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bday') ?></th>
            <td><?= h($user->bday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($user->assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Signup Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Role2 Id') ?></th>
                <th scope="col"><?= __('Callout') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->assignments as $assignments): ?>
            <tr>
                <td><?= h($assignments->id) ?></td>
                <td><?= h($assignments->show_id) ?></td>
                <td><?= h($assignments->user_id) ?></td>
                <td><?= h($assignments->signup_id) ?></td>
                <td><?= h($assignments->role_id) ?></td>
                <td><?= h($assignments->role2_id) ?></td>
                <td><?= h($assignments->callout) ?></td>
                <td><?= h($assignments->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Checkins') ?></h4>
        <?php if (!empty($user->checkins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Practice Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->checkins as $checkins): ?>
            <tr>
                <td><?= h($checkins->id) ?></td>
                <td><?= h($checkins->practice_id) ?></td>
                <td><?= h($checkins->user_id) ?></td>
                <td><?= h($checkins->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Checkins', 'action' => 'view', $checkins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Checkins', 'action' => 'edit', $checkins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Checkins', 'action' => 'delete', $checkins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Login Tokens') ?></h4>
        <?php if (!empty($user->login_tokens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Used') ?></th>
                <th scope="col"><?= __('Expires') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->login_tokens as $loginTokens): ?>
            <tr>
                <td><?= h($loginTokens->id) ?></td>
                <td><?= h($loginTokens->user_id) ?></td>
                <td><?= h($loginTokens->token) ?></td>
                <td><?= h($loginTokens->duration) ?></td>
                <td><?= h($loginTokens->used) ?></td>
                <td><?= h($loginTokens->expires) ?></td>
                <td><?= h($loginTokens->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LoginTokens', 'action' => 'view', $loginTokens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LoginTokens', 'action' => 'edit', $loginTokens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LoginTokens', 'action' => 'delete', $loginTokens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginTokens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scheduled Email Recipients') ?></h4>
        <?php if (!empty($user->scheduled_email_recipients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scheduled Email Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Is Email Sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->scheduled_email_recipients as $scheduledEmailRecipients): ?>
            <tr>
                <td><?= h($scheduledEmailRecipients->id) ?></td>
                <td><?= h($scheduledEmailRecipients->scheduled_email_id) ?></td>
                <td><?= h($scheduledEmailRecipients->user_id) ?></td>
                <td><?= h($scheduledEmailRecipients->email_address) ?></td>
                <td><?= h($scheduledEmailRecipients->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'view', $scheduledEmailRecipients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'edit', $scheduledEmailRecipients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScheduledEmailRecipients', 'action' => 'delete', $scheduledEmailRecipients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Signups') ?></h4>
        <?php if (!empty($user->signups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Show Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->signups as $signups): ?>
            <tr>
                <td><?= h($signups->id) ?></td>
                <td><?= h($signups->show_id) ?></td>
                <td><?= h($signups->user_id) ?></td>
                <td><?= h($signups->notes) ?></td>
                <td><?= h($signups->created) ?></td>
                <td><?= h($signups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Signups', 'action' => 'view', $signups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Signups', 'action' => 'edit', $signups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Signups', 'action' => 'delete', $signups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $signups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Activities') ?></h4>
        <?php if (!empty($user->user_activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Useragent') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Last Action') ?></th>
                <th scope="col"><?= __('Last Url') ?></th>
                <th scope="col"><?= __('User Browser') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Logout') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_activities as $userActivities): ?>
            <tr>
                <td><?= h($userActivities->id) ?></td>
                <td><?= h($userActivities->useragent) ?></td>
                <td><?= h($userActivities->user_id) ?></td>
                <td><?= h($userActivities->last_action) ?></td>
                <td><?= h($userActivities->last_url) ?></td>
                <td><?= h($userActivities->user_browser) ?></td>
                <td><?= h($userActivities->ip_address) ?></td>
                <td><?= h($userActivities->logout) ?></td>
                <td><?= h($userActivities->deleted) ?></td>
                <td><?= h($userActivities->created) ?></td>
                <td><?= h($userActivities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserActivities', 'action' => 'view', $userActivities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserActivities', 'action' => 'edit', $userActivities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserActivities', 'action' => 'delete', $userActivities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userActivities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Contacts') ?></h4>
        <?php if (!empty($user->user_contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Requirement') ?></th>
                <th scope="col"><?= __('Reply Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_contacts as $userContacts): ?>
            <tr>
                <td><?= h($userContacts->id) ?></td>
                <td><?= h($userContacts->user_id) ?></td>
                <td><?= h($userContacts->name) ?></td>
                <td><?= h($userContacts->email) ?></td>
                <td><?= h($userContacts->phone) ?></td>
                <td><?= h($userContacts->requirement) ?></td>
                <td><?= h($userContacts->reply_message) ?></td>
                <td><?= h($userContacts->created) ?></td>
                <td><?= h($userContacts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserContacts', 'action' => 'view', $userContacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserContacts', 'action' => 'edit', $userContacts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserContacts', 'action' => 'delete', $userContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContacts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Details') ?></h4>
        <?php if (!empty($user->user_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Nickname') ?></th>
                <th scope="col"><?= __('Jersey') ?></th>
                <th scope="col"><?= __('Starting Year') ?></th>
                <th scope="col"><?= __('Referee') ?></th>
                <th scope="col"><?= __('Host') ?></th>
                <th scope="col"><?= __('Voice') ?></th>
                <th scope="col"><?= __('Delete') ?></th>
                <th scope="col"><?= __('Member Standing Id') ?></th>
                <th scope="col"><?= __('Abc') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Cellphone') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_details as $userDetails): ?>
            <tr>
                <td><?= h($userDetails->id) ?></td>
                <td><?= h($userDetails->user_id) ?></td>
                <td><?= h($userDetails->nickname) ?></td>
                <td><?= h($userDetails->jersey) ?></td>
                <td><?= h($userDetails->starting_year) ?></td>
                <td><?= h($userDetails->referee) ?></td>
                <td><?= h($userDetails->host) ?></td>
                <td><?= h($userDetails->voice) ?></td>
                <td><?= h($userDetails->delete) ?></td>
                <td><?= h($userDetails->member_standing_id) ?></td>
                <td><?= h($userDetails->abc) ?></td>
                <td><?= h($userDetails->location) ?></td>
                <td><?= h($userDetails->cellphone) ?></td>
                <td><?= h($userDetails->created) ?></td>
                <td><?= h($userDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserDetails', 'action' => 'view', $userDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserDetails', 'action' => 'edit', $userDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserDetails', 'action' => 'delete', $userDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Email Recipients') ?></h4>
        <?php if (!empty($user->user_email_recipients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Email Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Is Email Sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_email_recipients as $userEmailRecipients): ?>
            <tr>
                <td><?= h($userEmailRecipients->id) ?></td>
                <td><?= h($userEmailRecipients->user_email_id) ?></td>
                <td><?= h($userEmailRecipients->user_id) ?></td>
                <td><?= h($userEmailRecipients->email_address) ?></td>
                <td><?= h($userEmailRecipients->is_email_sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserEmailRecipients', 'action' => 'view', $userEmailRecipients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserEmailRecipients', 'action' => 'edit', $userEmailRecipients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserEmailRecipients', 'action' => 'delete', $userEmailRecipients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailRecipients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Email Signatures') ?></h4>
        <?php if (!empty($user->user_email_signatures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Signature Name') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_email_signatures as $userEmailSignatures): ?>
            <tr>
                <td><?= h($userEmailSignatures->id) ?></td>
                <td><?= h($userEmailSignatures->user_id) ?></td>
                <td><?= h($userEmailSignatures->signature_name) ?></td>
                <td><?= h($userEmailSignatures->signature) ?></td>
                <td><?= h($userEmailSignatures->created) ?></td>
                <td><?= h($userEmailSignatures->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserEmailSignatures', 'action' => 'view', $userEmailSignatures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserEmailSignatures', 'action' => 'edit', $userEmailSignatures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserEmailSignatures', 'action' => 'delete', $userEmailSignatures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailSignatures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Email Templates') ?></h4>
        <?php if (!empty($user->user_email_templates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Template Name') ?></th>
                <th scope="col"><?= __('Header') ?></th>
                <th scope="col"><?= __('Footer') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_email_templates as $userEmailTemplates): ?>
            <tr>
                <td><?= h($userEmailTemplates->id) ?></td>
                <td><?= h($userEmailTemplates->user_id) ?></td>
                <td><?= h($userEmailTemplates->template_name) ?></td>
                <td><?= h($userEmailTemplates->header) ?></td>
                <td><?= h($userEmailTemplates->footer) ?></td>
                <td><?= h($userEmailTemplates->created) ?></td>
                <td><?= h($userEmailTemplates->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserEmailTemplates', 'action' => 'view', $userEmailTemplates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserEmailTemplates', 'action' => 'edit', $userEmailTemplates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserEmailTemplates', 'action' => 'delete', $userEmailTemplates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmailTemplates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Socials') ?></h4>
        <?php if (!empty($user->user_socials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Socialid') ?></th>
                <th scope="col"><?= __('Access Token') ?></th>
                <th scope="col"><?= __('Access Secret') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_socials as $userSocials): ?>
            <tr>
                <td><?= h($userSocials->id) ?></td>
                <td><?= h($userSocials->user_id) ?></td>
                <td><?= h($userSocials->type) ?></td>
                <td><?= h($userSocials->socialid) ?></td>
                <td><?= h($userSocials->access_token) ?></td>
                <td><?= h($userSocials->access_secret) ?></td>
                <td><?= h($userSocials->created) ?></td>
                <td><?= h($userSocials->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserSocials', 'action' => 'view', $userSocials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserSocials', 'action' => 'edit', $userSocials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserSocials', 'action' => 'delete', $userSocials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
