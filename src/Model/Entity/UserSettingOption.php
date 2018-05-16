<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSettingOption Entity
 *
 * @property int $id
 * @property int $user_setting_id
 * @property int $setting_option_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserSetting $user_setting
 * @property \App\Model\Entity\SettingOption $setting_option
 */
class UserSettingOption extends Entity
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
        'user_setting_id' => true,
        'setting_option_id' => true,
        'created' => true,
        'modified' => true,
        'user_setting' => true,
        'setting_option' => true
    ];
}
