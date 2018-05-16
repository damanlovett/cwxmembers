<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SettingOptions Model
 *
 * @property \App\Model\Table\UserSettingOptionsTable|\Cake\ORM\Association\HasMany $UserSettingOptions
 *
 * @method \App\Model\Entity\SettingOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\SettingOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SettingOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SettingOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SettingOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SettingOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SettingOption findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingOptionsTable extends Table
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

        $this->setTable('setting_options');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserSettingOptions', [
            'foreignKey' => 'setting_option_id'
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
            ->maxLength('title', 256)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
