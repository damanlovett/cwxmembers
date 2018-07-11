<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Month Entity
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property \Cake\I18n\FrozenDate $first_friday
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Practice[] $practices
 * @property \App\Model\Entity\Show[] $shows
 * @property \App\Model\Entity\Signup[] $signups
 */
class Month extends Entity
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
        'year' => true,
        'first_friday' => true,
        'created' => true,
        'practices' => true,
        'shows' => true,
        'signups' => true
    ];

    // full_name virtual field
    protected function _getDisplayName()
    {
        return $this->_properties['title'] . ' ' . $this->_properties['year'];
    }
}
