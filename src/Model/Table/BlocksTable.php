<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocks Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\RaritiesTable|\Cake\ORM\Association\BelongsTo $Rarities
 * @property \App\Model\Table\CorporationsTable|\Cake\ORM\Association\BelongsTo $Corporations
 * @property \App\Model\Table\BlockAttributesTable|\Cake\ORM\Association\HasMany $BlockAttributes
 * @property \App\Model\Table\RecipesTable|\Cake\ORM\Association\HasMany $Recipes
 *
 * @method \App\Model\Entity\Block get($primaryKey, $options = [])
 * @method \App\Model\Entity\Block newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Block[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Block|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Block|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Block patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Block[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Block findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlocksTable extends Table
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

        $this->setTable('blocks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rarities', [
            'foreignKey' => 'rarity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Corporations', [
            'foreignKey' => 'corporation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BlockAttributes', [
            'foreignKey' => 'block_id'
        ]);
        $this->hasMany('Recipes', [
            'foreignKey' => 'block_id'
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
            ->scalar('identifier')
            ->maxLength('identifier', 255)
            ->requirePresence('identifier', 'create')
            ->notEmpty('identifier')
            ->add('identifier', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('grade')
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('image_url')
            ->maxLength('image_url', 255)
            ->allowEmpty('image_url');

        $validator
            ->integer('purchase_price')
            ->allowEmpty('purchase_price');

        $validator
            ->integer('sale_price')
            ->allowEmpty('sale_price');

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
        $rules->add($rules->isUnique(['identifier']));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['rarity_id'], 'Rarities'));
        $rules->add($rules->existsIn(['corporation_id'], 'Corporations'));

        return $rules;
    }
}
