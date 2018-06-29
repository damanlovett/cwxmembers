<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shows Model
 *
 * @property \App\Model\Table\MonthsTable|\Cake\ORM\Association\BelongsTo $Months
 * @property \App\Model\Table\DropdownsTable|\Cake\ORM\Association\BelongsTo $Dropdowns
 * @property \App\Model\Table\AssignmentsTable|\Cake\ORM\Association\HasMany $Assignments
 * @property \App\Model\Table\SignupsTable|\Cake\ORM\Association\HasMany $Signups
 *
 * @method \App\Model\Entity\Show get($primaryKey, $options = [])
 * @method \App\Model\Entity\Show newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Show[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Show|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Show patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Show[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Show findOrCreate($search, callable $callback = null, $options = [])
 */
class ShowsTable extends Table
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

        $this->setTable('shows');
        $this->setDisplayField('DisplayName');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Months', [
            'foreignKey' => 'month_id'
        ]);
        $this->belongsTo('Dropdowns', [
            'foreignKey' => 'dropdown_id'
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'show_id'
        ]);
        $this->hasMany('Signups', [
            'foreignKey' => 'show_id'
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
            ->integer('dropdown_id')
            ->notEmpty('dropdown_id', 'Please select a show');

        $validator
            ->integer('month_id')
            ->notEmpty('month_id', 'Please select a month');

        $validator
            ->dateTime('schedule')
            ->notEmpty('schedule', 'Please select a date and time');

        $validator
            ->scalar('notes')
            ->allowEmpty('notes');

        $validator
            ->allowEmpty('signups_open');

        $validator
            ->allowEmpty('visible');

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
        $rules->add($rules->existsIn(['month_id'], 'Months'));
        $rules->add($rules->existsIn(['dropdown_id'], 'Dropdowns'));

        return $rules;
    }
}
