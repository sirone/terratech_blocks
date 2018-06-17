<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rarities Model
 *
 * @property \App\Model\Table\BlocksTable|\Cake\ORM\Association\HasMany $Blocks
 *
 * @method \App\Model\Entity\Rarity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rarity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rarity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rarity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rarity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rarity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rarity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RaritiesTable extends Table
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

        $this->setTable('rarities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Blocks', [
            'foreignKey' => 'rarity_id'
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('image_url')
            ->maxLength('image_url', 255)
            ->allowEmpty('image_url');

        return $validator;
    }
}
