<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Practices Model
 *
 * @property \App\Model\Table\MonthsTable|\Cake\ORM\Association\BelongsTo $Months
 * @property \App\Model\Table\CheckinsTable|\Cake\ORM\Association\HasMany $Checkins
 *
 * @method \App\Model\Entity\Practice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Practice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Practice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Practice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Practice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Practice findOrCreate($search, callable $callback = null, $options = [])
 */
class PracticesTable extends Table
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

        $this->setTable('practices');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Months', [
            'foreignKey' => 'month_id'
        ]);
        $this->hasMany('Checkins', [
            'foreignKey' => 'practice_id'
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
            ->dateTime('schedule')
            ->notEmpty('schedule', __('Please enter a valid date'));

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmpty('title');

        $validator
            ->scalar('leader')
            ->maxLength('leader', 100)
            ->allowEmpty('leader');

        $validator
            ->allowEmpty('visible');

        $validator
            ->allowEmpty('open');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

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

        return $rules;
    }
}