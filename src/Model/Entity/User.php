<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user_group_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $photo
 * @property \Cake\I18n\FrozenDate $bday
 * @property int $active
 * @property int $club_standing_id
 * @property int $email_verified
 * @property \Cake\I18n\FrozenTime $last_login
 * @property string $ip_address
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $created_by
 * @property int $modified_by
 *
 * @property \App\Model\Entity\UserGroup $user_group
 * @property \App\Model\Entity\ClubStanding $club_standing
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\Checkin[] $checkins
 * @property \App\Model\Entity\LoginToken[] $login_tokens
 * @property \App\Model\Entity\ScheduledEmailRecipient[] $scheduled_email_recipients
 * @property \App\Model\Entity\Signup[] $signups
 * @property \App\Model\Entity\UserActivity[] $user_activities
 * @property \App\Model\Entity\UserContact[] $user_contacts
 * @property \App\Model\Entity\UserDetail[] $user_details
 * @property \App\Model\Entity\UserEmailRecipient[] $user_email_recipients
 * @property \App\Model\Entity\UserEmailSignature[] $user_email_signatures
 * @property \App\Model\Entity\UserEmailTemplate[] $user_email_templates
 * @property \App\Model\Entity\UserSocial[] $user_socials
 */
class User extends Entity
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
        'user_group_id' => true,
        'username' => true,
        'password' => true,
        'email' => true,
        'first_name' => true,
        'last_name' => true,
        'gender' => true,
        'photo' => true,
        'bday' => true,
        'active' => true,
        'club_standing_id' => true,
        'email_verified' => true,
        'last_login' => true,
        'ip_address' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'user_group' => true,
        'club_standing' => true,
        'assignments' => true,
        'checkins' => true,
        'login_tokens' => true,
        'scheduled_email_recipients' => true,
        'signups' => true,
        'user_activities' => true,
        'user_contacts' => true,
        'user_details' => true,
        'user_email_recipients' => true,
        'user_email_signatures' => true,
        'user_email_templates' => true,
        'user_socials' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    // full_name virtual field
    protected function _getFullName()
    {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }

    // full_name virtual field
    protected function _getDisplayName()
    {
        return $this->_properties['last_name'] . ', ' . $this->_properties['first_name'];
    }
}
