<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Months Model
 *
 * @property \App\Model\Table\PracticesTable|\Cake\ORM\Association\HasMany $Practices
 * @property \App\Model\Table\ShowsTable|\Cake\ORM\Association\HasMany $Shows
 * @property \App\Model\Table\SignupsTable|\Cake\ORM\Association\HasMany $Signups
 *
 * @method \App\Model\Entity\Month get($primaryKey, $options = [])
 * @method \App\Model\Entity\Month newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Month[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Month|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Month patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Month[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Month findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MonthsTable extends Table
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

        $this->setTable('months');
        $this->setDisplayField('DisplayName');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Practices', [
            'foreignKey' => 'month_id'
        ]);
        $this->hasMany('Shows', [
            'foreignKey' => 'month_id'
        ]);
        $this->hasMany('Signups', [
            'foreignKey' => 'month_id'
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmpty('title');

        $validator
            ->scalar('year')
            ->allowEmpty('year');

        $validator
            ->date('first_friday')
            ->requirePresence('first_friday', 'create')
            ->notEmpty('first_friday');

        return $validator;
    }
}
