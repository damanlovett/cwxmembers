<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScheduledEmail Entity
 *
 * @property int $id
 * @property int $user_email_id
 * @property string $type
 * @property string $user_group_id
 * @property string $cc_to
 * @property string $from_name
 * @property string $from_email
 * @property string $subject
 * @property string $message
 * @property \Cake\I18n\FrozenTime $schedule_date
 * @property int $is_sent
 * @property int $scheduled_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserEmail $user_email
 * @property \App\Model\Entity\UserGroup $user_group
 * @property \App\Model\Entity\ScheduledEmailRecipient[] $scheduled_email_recipients
 */
class ScheduledEmail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_email_id' => true,
        'type' => true,
        'user_group_id' => true,
        'cc_to' => true,
        'from_name' => true,
        'from_email' => true,
        'subject' => true,
        'message' => true,
        'schedule_date' => true,
        'is_sent' => true,
        'scheduled_by' => true,
        'created' => true,
        'modified' => true,
        'user_email' => true,
        'user_group' => true,
        'scheduled_email_recipients' => true
    ];
}
