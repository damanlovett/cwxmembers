<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignment Entity
 *
 * @property int $id
 * @property int $show_id
 * @property int $user_id
 * @property int $signup_id
 * @property int $role_id
 * @property int $role2_id
 * @property int $callout
 * @property string $notes
 *
 * @property \App\Model\Entity\Show $show
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Signup $signup
 * @property \App\Model\Entity\Role $role
 */
class Assignment extends Entity
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
        'show_id' => true,
        'user_id' => true,
        'signup_id' => true,
        'role_id' => true,
        'role2_id' => true,
        'callout' => true,
        'notes' => true,
        'show' => true,
        'user' => true,
        'signup' => true,
        'role' => true
    ];
}
