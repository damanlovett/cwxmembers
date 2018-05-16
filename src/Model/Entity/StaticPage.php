<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StaticPage Entity
 *
 * @property int $id
 * @property string $page_name
 * @property string $url_name
 * @property string $page_content
 * @property string $page_title
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class StaticPage extends Entity
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
        'page_name' => true,
        'url_name' => true,
        'page_content' => true,
        'page_title' => true,
        'created' => true,
        'modified' => true
    ];
}
