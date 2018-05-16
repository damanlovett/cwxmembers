<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MemberStandings Model
 *
 * @property \App\Model\Table\UserDetailsTable|\Cake\ORM\Association\HasMany $UserDetails
 *
 * @method \App\Model\Entity\MemberStanding get($primaryKey, $options = [])
 * @method \App\Model\Entity\MemberStanding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MemberStanding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MemberStanding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MemberStanding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MemberStanding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MemberStanding findOrCreate($search, callable $callback = null, $options = [])
 */
class MemberStandingsTable extends Table
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

        $this->setTable('member_standings');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('UserDetails', [
            'foreignKey' => 'member_standing_id'
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
            ->scalar('notes')
            ->maxLength('notes', 4294967295)
            ->allowEmpty('notes');

        return $validator;
    }
}
