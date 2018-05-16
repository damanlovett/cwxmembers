<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroupPermissions Model
 *
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\BelongsTo $UserGroups
 *
 * @method \App\Model\Entity\UserGroupPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserGroupPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserGroupPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserGroupPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupPermission findOrCreate($search, callable $callback = null, $options = [])
 */
class UserGroupPermissionsTable extends Table
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

        $this->setTable('user_group_permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
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
            ->scalar('prefix')
            ->maxLength('prefix', 256)
            ->allowEmpty('prefix');

        $validator
            ->scalar('plugin')
            ->maxLength('plugin', 50)
            ->allowEmpty('plugin');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 50)
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 100)
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        $validator
            ->integer('allowed')
            ->requirePresence('allowed', 'create')
            ->notEmpty('allowed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }
}
