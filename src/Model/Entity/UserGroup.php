<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroup Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $description
 * @property int $registration_allowed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ParentUserGroup $parent_user_group
 * @property \App\Model\Entity\ScheduledEmail[] $scheduled_emails
 * @property \App\Model\Entity\UserEmail[] $user_emails
 * @property \App\Model\Entity\UserGroupPermission[] $user_group_permissions
 * @property \App\Model\Entity\ChildUserGroup[] $child_user_groups
 * @property \App\Model\Entity\User[] $users
 */
class UserGroup extends Entity
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
        'parent_id' => true,
        'name' => true,
        'description' => true,
        'registration_allowed' => true,
        'created' => true,
        'modified' => true,
        'parent_user_group' => true,
        'scheduled_emails' => true,
        'user_emails' => true,
        'user_group_permissions' => true,
        'child_user_groups' => true,
        'users' => true
    ];
}
