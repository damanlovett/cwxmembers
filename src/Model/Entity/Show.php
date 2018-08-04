<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\I18n\Date;

/**
 * Show Entity
 *
 * @property int $id
 * @property int $month_id
 * @property int $dropdown_id
 * @property \Cake\I18n\FrozenTime $schedule
 * @property string $notes
 * @property int $signups_open
 *
 * @property \App\Model\Entity\Month $month
 * @property \App\Model\Entity\Dropdown $dropdown
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\Signup[] $signups
 */
class Show extends Entity
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
        'dropdown_id' => true,
        'schedule' => true,
        'notes' => true,
        'signups_open' => true,
        'month' => true,
        'dropdown' => true,
        'assignments' => true,
        'signups' => true,
        'ref_needed' => true,
        'players_needed' => true,
        'voice_needed' => true,
        'host_needed' => true,
        'visible' => true,
        'show_url' => true
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
        $name = $this->_properties['dropdown']['name'];

        return $name." :: ".$date->format('M j, Y - g:i a');
    }

    // Signup Count
    public function numberOfSignups()
    {
        return count($this->signups);
    }

}
