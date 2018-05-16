<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClubStandings Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\ClubStanding get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClubStanding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClubStanding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClubStanding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClubStanding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClubStanding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClubStanding findOrCreate($search, callable $callback = null, $options = [])
 */
class ClubStandingsTable extends Table
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

        $this->setTable('club_standings');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'club_standing_id'
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
