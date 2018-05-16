<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LoginTokens Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\LoginToken get($primaryKey, $options = [])
 * @method \App\Model\Entity\LoginToken newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LoginToken[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LoginToken|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoginToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LoginToken[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LoginToken findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoginTokensTable extends Table
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

        $this->setTable('login_tokens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('token')
            ->maxLength('token', 32)
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 32)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->boolean('used')
            ->requirePresence('used', 'create')
            ->notEmpty('used');

        $validator
            ->dateTime('expires')
            ->requirePresence('expires', 'create')
            ->notEmpty('expires');

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
