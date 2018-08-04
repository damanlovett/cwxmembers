<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Practice Entity
 *
 * @property int $id
 * @property int $month_id
 * @property \Cake\I18n\FrozenTime $schedule
 * @property string $title
 * @property string $leader
 * @property string $description
 *
 * @property \App\Model\Entity\Month $month
 * @property \App\Model\Entity\Checkin[] $checkins
 */
class Practice extends Entity
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
        'month_id' => true,
        'schedule' => true,
        'title' => true,
        'leader' => true,
        'visible' => true,
        'open' => true,
        'description' => true,
        'month' => true,
        'checkins' => true
    ];

    // full_name virtual field
    protected function _getDisplayName()
    {
        $date = new Date($this->_properties['schedule']);

        return $date->format('M j, Y - g:i a');
    }

    // full_name with Name virtual field
    protected function _getFullName()
    {
        $date = new Date($this->_properties['schedule']);
        $name = $this->_properties['title'];

        return $name." :: ".$date->format('M j, Y - g:i a');
    }
}
