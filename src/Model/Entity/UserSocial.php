<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSocial Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $socialid
 * @property string $access_token
 * @property string $access_secret
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserSocial extends Entity
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
        'user_id' => true,
        'type' => true,
        'socialid' => true,
        'access_token' => true,
        'access_secret' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
