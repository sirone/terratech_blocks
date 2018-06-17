<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChunkRarities Model
 *
 * @property \App\Model\Table\ChunksTable|\Cake\ORM\Association\HasMany $Chunks
 *
 * @method \App\Model\Entity\ChunkRarity get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChunkRarity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ChunkRarity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChunkRarity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChunkRarity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChunkRarity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChunkRarity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChunkRaritiesTable extends Table
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

        $this->setTable('chunk_rarities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Chunks', [
            'foreignKey' => 'chunk_rarity_id'
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

        return $validator;
    }
}
