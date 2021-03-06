<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClubStanding Entity
 *
 * @property int $id
 * @property string $title
 * @property string $notes
 *
 * @property \App\Model\Entity\User[] $users
 */
class ClubStanding extends Entity
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
        'users' => true
    ];

    // full_name virtual field
    protected function _getDisplayName()
    {
        return $this->_properties['title'];
    }

    /**
     * Used to get title by user id association
     *
     * @access public
     * @param integer $userId user id
     * @return string
     */
    public function getTitleById($id)
    {
        $result = $this->find()
            ->select(['ClubStandings.title'])
            ->where(['ClubStandings.id' => $id])
            ->first();
        $title = (!empty($result)) ? ($result['title']) : '';
        return $title;
    }
}