<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserSettings Model
 *
 * @property \App\Model\Table\UserSettingOptionsTable|\Cake\ORM\Association\HasMany $UserSettingOptions
 *
 * @method \App\Model\Entity\UserSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserSetting findOrCreate($search, callable $callback = null, $options = [])
 */
class UserSettingsTable extends Table
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

        $this->setTable('user_settings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('UserSettingOptions', [
            'foreignKey' => 'user_setting_id'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmpty('name');

        $validator
            ->scalar('display_name')
            ->maxLength('display_name', 1024)
            ->allowEmpty('display_name');

        $validator
            ->scalar('value')
            ->allowEmpty('value');

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmpty('type');

        $validator
            ->scalar('category')
            ->maxLength('category', 20)
            ->allowEmpty('category');

        return $validator;
    }
}
