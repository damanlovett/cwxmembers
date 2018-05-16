<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup $userGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Group'), ['action' => 'edit', $userGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Group'), ['action' => 'delete', $userGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scheduled Emails'), ['controller' => 'ScheduledEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheduled Email'), ['controller' => 'ScheduledEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Emails'), ['controller' => 'UserEmails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Email'), ['controller' => 'UserEmails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Group Permissions'), ['controller' => 'UserGroupPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group Permission'), ['controller' => 'UserGroupPermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userGroups view large-9 medium-8 columns content">
    <h3><?= h($userGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent User Group') ?></th>
            <td><?= $userGroup->has('parent_user_group') ? $this->Html->link($userGroup->parent_user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroup->parent_user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($userGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registration Allowed') ?></th>
            <td><?= $this->Number->format($userGroup->registration_allowed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userGroup->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($userGroup->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scheduled Emails') ?></h4>
        <?php if (!empty($userGroup->scheduled_emails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Email Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Cc To') ?></th>
                <th scope="col"><?= __('From Name') ?></th>
                <th scope="col"><?= __('From Email') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Schedule Date') ?></th>
                <th scope="col"><?= __('Is Sent') ?></th>
                <th scope="col"><?= __('Scheduled By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->scheduled_emails as $scheduledEmails): ?>
            <tr>
                <td><?= h($scheduledEmails->id) ?></td>
                <td><?= h($scheduledEmails->user_email_id) ?></td>
                <td><?= h($scheduledEmails->type) ?></td>
                <td><?= h($scheduledEmails->user_group_id) ?></td>
                <td><?= h($scheduledEmails->cc_to) ?></td>
                <td><?= h($scheduledEmails->from_name) ?></td>
                <td><?= h($scheduledEmails->from_email) ?></td>
                <td><?= h($scheduledEmails->subject) ?></td>
                <td><?= h($scheduledEmails->message) ?></td>
                <td><?= h($scheduledEmails->schedule_date) ?></td>
                <td><?= h($scheduledEmails->is_sent) ?></td>
                <td><?= h($scheduledEmails->scheduled_by) ?></td>
                <td><?= h($scheduledEmails->created) ?></td>
                <td><?= h($scheduledEmails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScheduledEmails', 'action' => 'edit', $scheduledEmails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScheduledEmails', 'action' => 'delete', $scheduledEmails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Emails') ?></h4>
        <?php if (!empty($userGroup->user_emails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Cc To') ?></th>
                <th scope="col"><?= __('From Name') ?></th>
                <th scope="col"><?= __('From Email') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Sent By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->user_emails as $userEmails): ?>
            <tr>
                <td><?= h($userEmails->id) ?></td>
                <td><?= h($userEmails->type) ?></td>
                <td><?= h($userEmails->user_group_id) ?></td>
                <td><?= h($userEmails->cc_to) ?></td>
                <td><?= h($userEmails->from_name) ?></td>
                <td><?= h($userEmails->from_email) ?></td>
                <td><?= h($userEmails->subject) ?></td>
                <td><?= h($userEmails->message) ?></td>
                <td><?= h($userEmails->sent_by) ?></td>
                <td><?= h($userEmails->created) ?></td>
                <td><?= h($userEmails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserEmails', 'action' => 'view', $userEmails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserEmails', 'action' => 'edit', $userEmails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserEmails', 'action' => 'delete', $userEmails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userEmails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Group Permissions') ?></h4>
        <?php if (!empty($userGroup->user_group_permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Prefix') ?></th>
                <th scope="col"><?= __('Plugin') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Allowed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->user_group_permissions as $userGroupPermissions): ?>
            <tr>
                <td><?= h($userGroupPermissions->id) ?></td>
                <td><?= h($userGroupPermissions->user_group_id) ?></td>
                <td><?= h($userGroupPermissions->prefix) ?></td>
                <td><?= h($userGroupPermissions->plugin) ?></td>
                <td><?= h($userGroupPermissions->controller) ?></td>
                <td><?= h($userGroupPermissions->action) ?></td>
                <td><?= h($userGroupPermissions->allowed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserGroupPermissions', 'action' => 'view', $userGroupPermissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserGroupPermissions', 'action' => 'edit', $userGroupPermissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserGroupPermissions', 'action' => 'delete', $userGroupPermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Groups') ?></h4>
        <?php if (!empty($userGroup->child_user_groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Registration Allowed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->child_user_groups as $childUserGroups): ?>
            <tr>
                <td><?= h($childUserGroups->id) ?></td>
                <td><?= h($childUserGroups->parent_id) ?></td>
                <td><?= h($childUserGroups->name) ?></td>
                <td><?= h($childUserGroups->description) ?></td>
                <td><?= h($childUserGroups->registration_allowed) ?></td>
                <td><?= h($childUserGroups->created) ?></td>
                <td><?= h($childUserGroups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserGroups', 'action' => 'view', $childUserGroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserGroups', 'action' => 'edit', $childUserGroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserGroups', 'action' => 'delete', $childUserGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childUserGroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($userGroup->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Group Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Bday') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Club Standing Id') ?></th>
                <th scope="col"><?= __('Email Verified') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userGroup->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->user_group_id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->bday) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->club_standing_id) ?></td>
                <td><?= h($users->email_verified) ?></td>
                <td><?= h($users->last_login) ?></td>
                <td><?= h($users->ip_address) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->created_by) ?></td>
                <td><?= h($users->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
