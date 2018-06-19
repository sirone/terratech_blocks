<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ComponentRecipe Entity
 *
 * @property int $id
 * @property int $chunk_id
 * @property int $need_chunk_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Chunk $chunk
 * @property \App\Model\Entity\Chunk $need_chunk
 */
class ComponentRecipe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'chunk_id' => true,
        'need_chunk_id' => true,
        'created' => true,
        'modified' => true,
        'chunk' => true,
        'need_chunk' => true
    ];
}
