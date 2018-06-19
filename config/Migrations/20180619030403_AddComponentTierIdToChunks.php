<?php
use Migrations\AbstractMigration;

class AddComponentTierIdToChunks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('chunks');
        $table->addColumn('chunk_category_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'after' => 'refined_chunk_id',
            'signed' => false,
            'comment' => 'chunk_categories のプライマリキー'
        ]);
        $table->addColumn('component_tier_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'after' => 'chunk_rarity_id',
            'signed' => false,
            'comment' => 'component_tiers のプライマリキー'
        ]);
        $table->update();
    }
}
