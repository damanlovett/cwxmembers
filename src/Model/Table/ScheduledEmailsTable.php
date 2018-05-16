<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScheduledEmails Model
 *
 * @property \App\Model\Table\UserEmailsTable|\Cake\ORM\Association\BelongsTo $UserEmails
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\BelongsTo $UserGroups
 * @property \App\Model\Table\ScheduledEmailRecipientsTable|\Cake\ORM\Association\HasMany $ScheduledEmailRecipients
 *
 * @method \App\Model\Entity\ScheduledEmail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ScheduledEmail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ScheduledEmail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScheduledEmail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ScheduledEmail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ScheduledEmail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScheduledEmail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScheduledEmailsTable extends Table
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

        $this->setTable('scheduled_emails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserEmails', [
            'foreignKey' => 'user_email_id'
        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id'
        ]);
        $this->hasMany('ScheduledEmailRecipients', [
            'foreignKey' => 'scheduled_email_id'
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
            ->scalar('type')
            ->maxLength('type', 50)
            ->allowEmpty('type');

        $validator
            ->scalar('cc_to')
            ->allowEmpty('cc_to');

        $validator
            ->scalar('from_name')
            ->maxLength('from_name', 200)
            ->allowEmpty('from_name');

        $validator
            ->scalar('from_email')
            ->maxLength('from_email', 200)
            ->allowEmpty('from_email');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 500)
            ->allowEmpty('subject');

        $validator
            ->scalar('message')
            ->allowEmpty('message');

        $validator
            ->dateTime('schedule_date')
            ->allowEmpty('schedule_date');

        $validator
            ->integer('is_sent')
            ->requirePresence('is_sent', 'create')
            ->notEmpty('is_sent');

        $validator
            ->integer('scheduled_by')
            ->allowEmpty('scheduled_by');

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
        $rules->add($rules->existsIn(['user_email_id'], 'UserEmails'));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }
}
