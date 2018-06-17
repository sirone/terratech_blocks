<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chunks Model
 *
 * @property \App\Model\Table\RefinedChunksTable|\Cake\ORM\Association\BelongsTo $RefinedChunks
 * @property \App\Model\Table\ChunkRaritiesTable|\Cake\ORM\Association\BelongsTo $ChunkRarities
 *
 * @method \App\Model\Entity\Chunk get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chunk newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chunk[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chunk|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chunk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chunk[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chunk findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChunksTable extends Table
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

        $this->setTable('chunks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RefinedChunks', [
            'foreignKey' => 'refined_chunk_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ChunkRarities', [
            'foreignKey' => 'chunk_rarity_id',
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
            ->integer('sell_price')
            ->requirePresence('sell_price', 'create')
            ->notEmpty('sell_price');

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
        $rules->add($rules->existsIn(['refined_chunk_id'], 'RefinedChunks'));
        $rules->add($rules->existsIn(['chunk_rarity_id'], 'ChunkRarities'));

        return $rules;
    }
}
