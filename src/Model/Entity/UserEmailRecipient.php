<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserEmailRecipient Entity
 *
 * @property int $id
 * @property int $user_email_id
 * @property int $user_id
 * @property string $email_address
 * @property int $is_email_sent
 *
 * @property \App\Model\Entity\UserEmail $user_email
 * @property \App\Model\Entity\User $user
 */
class UserEmailRecipient extends Entity
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
        'user_id' => true,
        'email_address' => true,
        'is_email_sent' => true,
        'user_email' => true,
        'user' => true
    ];
}
