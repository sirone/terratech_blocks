<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chunk Entity
 *
 * @property int $id
 * @property string $identifier
 * @property string $name
 * @property string $description
 * @property string $image_url
 * @property int $sell_price
 * @property int $refined_chunk_id
 * @property int $chunk_category_id
 * @property int $chunk_rarity_id
 * @property int $component_tier_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Chunk $refined_chunk
 * @property \App\Model\Entity\ChunkRarity $chunk_rarity
 */
class Chunk extends Entity
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
        'identifier' => true,
        'name' => true,
        'description' => true,
        'image_url' => true,
        'sell_price' => true,
        'refined_chunk_id' => true,
        'chunk_category_id' => true,
        'chunk_rarity_id' => true,
        'component_tier_id' => true,
        'created' => true,
        'modified' => true,
        'refined_chunk' => true,
        'chunk_rarity' => true
    ];
}
