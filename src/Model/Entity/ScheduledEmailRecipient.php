<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScheduledEmailRecipient Entity
 *
 * @property int $id
 * @property int $scheduled_email_id
 * @property int $user_id
 * @property string $email_address
 * @property int $is_email_sent
 *
 * @property \App\Model\Entity\ScheduledEmail $scheduled_email
 * @property \App\Model\Entity\User $user
 */
class ScheduledEmailRecipient extends Entity
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
        'scheduled_email_id' => true,
        'user_id' => true,
        'email_address' => true,
        'is_email_sent' => true,
        'scheduled_email' => true,
        'user' => true
    ];
}
