<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroups Model
 *
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\BelongsTo $ParentUserGroups
 * @property \App\Model\Table\ScheduledEmailsTable|\Cake\ORM\Association\HasMany $ScheduledEmails
 * @property \App\Model\Table\UserEmailsTable|\Cake\ORM\Association\HasMany $UserEmails
 * @property \App\Model\Table\UserGroupPermissionsTable|\Cake\ORM\Association\HasMany $UserGroupPermissions
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\HasMany $ChildUserGroups
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\UserGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserGroupsTable extends Table
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

        $this->setTable('user_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentUserGroups', [
            'className' => 'UserGroups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ScheduledEmails', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('UserEmails', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('ChildUserGroups', [
            'className' => 'UserGroups',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_group_id'
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
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->integer('registration_allowed')
            ->requirePresence('registration_allowed', 'create')
            ->notEmpty('registration_allowed');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentUserGroups'));

        return $rules;
    }
}
