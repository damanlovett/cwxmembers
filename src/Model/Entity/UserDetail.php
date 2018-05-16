<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $nickname
 * @property string $jersey
 * @property \Cake\I18n\FrozenDate $starting_year
 * @property int $referee
 * @property int $host
 * @property int $voice
 * @property string $delete
 * @property int $member_standing_id
 * @property int $abc
 * @property string $location
 * @property string $cellphone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MemberStanding $member_standing
 */
class UserDetail extends Entity
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
        'nickname' => true,
        'jersey' => true,
        'starting_year' => true,
        'referee' => true,
        'host' => true,
        'voice' => true,
        'delete' => true,
        'member_standing_id' => true,
        'abc' => true,
        'location' => true,
        'cellphone' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'member_standing' => true
    ];
}
