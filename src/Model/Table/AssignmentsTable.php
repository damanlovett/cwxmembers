<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assignments Model
 *
 * @property \App\Model\Table\ShowsTable|\Cake\ORM\Association\BelongsTo $Shows
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SignupsTable|\Cake\ORM\Association\BelongsTo $Signups
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\Assignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assignment findOrCreate($search, callable $callback = null, $options = [])
 */
class AssignmentsTable extends Table
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

        $this->setTable('assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Signups', [
            'foreignKey' => 'signup_id'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Roles2', [
            'foreignKey' => 'role2_id',
            'className' => 'Roles'
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
            ->allowEmpty('callout');

        $validator
            ->scalar('notes')
            ->maxLength('notes', 4294967295)
            ->allowEmpty('notes');

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
        $rules->add($rules->existsIn(['show_id'], 'Shows'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['signup_id'], 'Signups'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['role2_id'], 'Roles'));

        return $rules;
    }
}
