<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dropdowns Model
 *
 * @property \App\Model\Table\ShowsTable|\Cake\ORM\Association\HasMany $Shows
 *
 * @method \App\Model\Entity\Dropdown get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dropdown newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dropdown[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dropdown patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown findOrCreate($search, callable $callback = null, $options = [])
 */
class DropdownsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dropdowns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Shows', [
            'foreignKey' => 'dropdown_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmpty('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->allowEmpty('type');

        return $validator;
    }
    /**
     * Used to get title by id
     *
     * @access public
     * @param integer $id user id
     * @return string
     */
    public function getDropdownById($id) {
        $result = $this->find()
                ->select(['Dropdowns.name'])
                ->where(['Dropdowns.id'=>$id])
                ->first();
        $name = (!empty($result)) ? ($result['name']) : '';
        return $name;
    }
}
