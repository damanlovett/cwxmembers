<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MemberStanding Entity
 *
 * @property int $id
 * @property string $title
 * @property string $notes
 *
 * @property \App\Model\Entity\UserDetail[] $user_details
 */
class MemberStanding extends Entity
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
        'title' => true,
        'notes' => true,
        'user_details' => true
    ];
    // full_name virtual field
    protected function _getDisplayName()
    {
        return $this->_properties['title'];
    }

}
