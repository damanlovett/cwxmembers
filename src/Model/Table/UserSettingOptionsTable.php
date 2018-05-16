<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserSettingOptions Model
 *
 * @property \App\Model\Table\UserSettingsTable|\Cake\ORM\Association\BelongsTo $UserSettings
 * @property \App\Model\Table\SettingOptionsTable|\Cake\ORM\Association\BelongsTo $SettingOptions
 *
 * @method \App\Model\Entity\UserSettingOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserSettingOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserSettingOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserSettingOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserSettingOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserSettingOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserSettingOption findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserSettingOptionsTable extends Table
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

        $this->setTable('user_setting_options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserSettings', [
            'foreignKey' => 'user_setting_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SettingOptions', [
            'foreignKey' => 'setting_option_id',
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
        $rules->add($rules->existsIn(['user_setting_id'], 'UserSettings'));
        $rules->add($rules->existsIn(['setting_option_id'], 'SettingOptions'));

        return $rules;
    }
}
