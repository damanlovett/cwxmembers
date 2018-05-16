<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserActivity Entity
 *
 * @property int $id
 * @property string $useragent
 * @property int $user_id
 * @property int $last_action
 * @property string $last_url
 * @property string $user_browser
 * @property string $ip_address
 * @property int $logout
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserActivity extends Entity
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
        'useragent' => true,
        'user_id' => true,
        'last_action' => true,
        'last_url' => true,
        'user_browser' => true,
        'ip_address' => true,
        'logout' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
