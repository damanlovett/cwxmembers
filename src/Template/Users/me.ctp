<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-12 medium-11 columns content">
    <h3><i class="fas fa-user-circle fa-1x fa-fw"></i>&nbsp;&nbsp;<?= $user->first_name."'s  Activities" ?></h3>


    <div class="related">
        <h4><?= __('Club Information') ?></h4>
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
<?php if($userDetails->abc = 0) :?>
<?php echo $this->Html->link('','/#', ['data-toggle'=>'modal', 'data-target'=>".bs-example-modal-lg",'class'=>'fas fa-info-circle fa-lg  fa-fw text-success', 'title'=>'title']); ?>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
<div class="row">
    <div class="col-md-11" style="padding:30px;">
<h3>ABC CERTIFICATION:</h3>
<p>As you all know by now, we had a visit from the ALE (awww) a few weeks ago and we need to make sure that anyone who works selling alcohol at our concession has their ABC Certification.  If you have not yet been certified, here is what you need to do:</p>
<ul>
<li>Go to the ABC Website</li>
<li>Click on “Register for Seller/Server Training Program”</li>
<li>Click on the “Search for a business that I represent that currently holds permits OR has applied for permits” radio button</li>
<li>Type “Worx Comedy Theatre” in the “Trade Name” field and click on the “Search” button.</li>
<li>Select the club, register on the site and take the test</li>
<li>When you are done, you’ll be able to download a PDF copy of the ABC Certificate.  Please e-mail your certification to myself, Ashley and Michael Teague.</li>
</div>
</div>
</div>
  </div>
</div>
<?php endif;?>
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

<div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>&nbsp;</h2>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">My Line Ups</a></li>
                            <li><a href="#tab2" data-toggle="tab">Practice :: Check ins</a></li>
                            <li><a href="#tab3" data-toggle="tab">Show :: Sign Ups</a></li>
                        </ul>
                    </span>
                </div>
              <hr />
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

<div class="assignments index large-9 medium-8 columns content">
    <h3><?= __('Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('show_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?php if(!empty($assignment->Dropdowns['name'])) { echo $assignment->Dropdowns['name'] ;} ?></td>
                <td><?php if(!empty($assignment->show->schedule)) { echo $assignment->show->schedule ;} ?></td>
                <td><?= $assignment->has('role') ? $this->Html->link($assignment->role->name, ['controller' => 'Roles', 'action' => 'view', $assignment->role->id]) : '' ?></td>
                <td><?= $assignment->has('roles2') ? $this->Html->link($assignment->roles2->name, ['controller' => 'Roles', 'action' => 'view', $assignment->roles2->id]) : '' ?></td>
                <td><?= $assignment->callout ? "Yes" : "No" ;?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

                        </div>
                        <div class="tab-pane" id="tab2">

Coming Soon ( still under construction)

                        </div>
                        <div class="tab-pane" id="tab3">

Coming Soon ( still under construction)


                        </div>
                    </div>
                </div>
            </div>































<div  style="display:none" > <!-- Heading page until finished -->
    <div class="related">






<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('show_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('signup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('callout') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignments as $assignment): ?>
            <tr>
                <td><?= $this->Number->format($assignment->id) ?></td>
                <td><?= $assignment->has('show') ? $this->Html->link($assignment->show->id, ['controller' => 'Shows', 'action' => 'view', $assignment->show->id]) : '' ?></td>
                <td><?= $assignment->has('user') ? $this->Html->link($assignment->user->id, ['controller' => 'Users', 'action' => 'view', $assignment->user->id]) : '' ?></td>
                <td><?= $assignment->has('show') ? $assignment->show->schedule : '' ?></td>
                <td><?= $assignment->has('role') ? $this->Html->link($assignment->role->name, ['controller' => 'Roles', 'action' => 'view', $assignment->role->id]) : '' ?></td>
                <td><?= $assignment->has('roles2') ? $this->Html->link($assignment->roles2->name, ['controller' => 'Roles', 'action' => 'view', $assignment->roles2->id]) : '' ?></td>
                <td><?= $this->Number->format($assignment->callout) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>






















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
                <td><?= h($assignments->show) ?></td>
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
</div> <!------- End of Display None ------->
</div>
