<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Signups Model
 *
 * @property \App\Model\Table\ShowsTable|\Cake\ORM\Association\BelongsTo $Shows
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AssignmentsTable|\Cake\ORM\Association\HasMany $Assignments
 *
 * @method \App\Model\Entity\Signup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Signup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Signup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Signup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Signup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Signup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Signup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SignupsTable extends Table
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

        $this->setTable('signups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id'
        ]);
        $this->belongsTo('Signups', [
            'foreignKey' => 'signup_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Months', [
            'foreignKey' => 'month_id'
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'signup_id'
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
        // A list of fields
        $rules->add($rules->isUnique(
            ['user_id', 'show_id'],
            'You have already signed up for this show.'
        ));

        return $rules;
    }
}
