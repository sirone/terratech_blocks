<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Block Entity
 *
 * @property int $id
 * @property string $identifier
 * @property int $category_id
 * @property int $rarity_id
 * @property int $corporation_id
 * @property int $grade
 * @property string $name
 * @property string $description
 * @property string $image_url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Rarity $rarity
 * @property \App\Model\Entity\Corporation $corporation
 * @property \App\Model\Entity\BlockAttribute[] $block_attributes
 * @property \App\Model\Entity\Recipe[] $recipes
 */
class Block extends Entity
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
        'category_id' => true,
        'rarity_id' => true,
        'corporation_id' => true,
        'grade' => true,
        'name' => true,
        'description' => true,
        'image_url' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'rarity' => true,
        'corporation' => true,
        'block_attributes' => true,
        'recipes' => true
    ];
}
