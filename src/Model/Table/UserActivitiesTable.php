<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserActivities Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserActivity get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserActivity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserActivity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserActivity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserActivity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserActivity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserActivity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserActivitiesTable extends Table
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

        $this->setTable('user_activities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->scalar('useragent')
            ->maxLength('useragent', 256)
            ->requirePresence('useragent', 'create')
            ->notEmpty('useragent');

        $validator
            ->integer('last_action')
            ->requirePresence('last_action', 'create')
            ->notEmpty('last_action');

        $validator
            ->scalar('last_url')
            ->allowEmpty('last_url');

        $validator
            ->scalar('user_browser')
            ->allowEmpty('user_browser');

        $validator
            ->scalar('ip_address')
            ->maxLength('ip_address', 50)
            ->allowEmpty('ip_address');

        $validator
            ->integer('logout')
            ->requirePresence('logout', 'create')
            ->notEmpty('logout');

        $validator
            ->integer('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
