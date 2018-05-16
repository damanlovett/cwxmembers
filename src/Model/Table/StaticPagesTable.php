<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaticPages Model
 *
 * @method \App\Model\Entity\StaticPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\StaticPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StaticPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StaticPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StaticPagesTable extends Table
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

        $this->setTable('static_pages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('page_name')
            ->allowEmpty('page_name');

        $validator
            ->scalar('url_name')
            ->allowEmpty('url_name');

        $validator
            ->scalar('page_content')
            ->allowEmpty('page_content');

        $validator
            ->scalar('page_title')
            ->allowEmpty('page_title');

        return $validator;
    }
}
