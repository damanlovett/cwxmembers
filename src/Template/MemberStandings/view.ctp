<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberStanding $memberStanding
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member Standing'), ['action' => 'edit', $memberStanding->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member Standing'), ['action' => 'delete', $memberStanding->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberStanding->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Member Standings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member Standing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Details'), ['controller' => 'UserDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Detail'), ['controller' => 'UserDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="memberStandings view large-9 medium-8 columns content">
    <h3><?= h($memberStanding->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($memberStanding->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($memberStanding->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($memberStanding->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Details') ?></h4>
        <?php if (!empty($memberStanding->user_details)): ?>
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
            <?php foreach ($memberStanding->user_details as $userDetails): ?>
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
</div>
