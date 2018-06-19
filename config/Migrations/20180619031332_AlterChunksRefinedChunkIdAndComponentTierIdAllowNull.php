<?php
use Migrations\AbstractMigration;

class AlterChunksRefinedChunkIdAndComponentTierIdAllowNull extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('chunks');
        $table->changeColumn('refined_chunk_id', 'integer', [
            'limit' => 10,
            'signed' => false,
            'null' => true,
            'comment' => 'chunks のプライマリキー',
        ]);
        $table->changeColumn('chunk_rarity_id', 'integer', [
            'limit' => 10,
            'signed' => false,
            'null' => false,
            'comment' => 'chunk_rarities のプライマリキー',
        ]);
        $table->changeColumn('component_tier_id', 'integer', [
            'limit' => 10,
            'signed' => false,
            'null' => true,
            'comment' => 'component_tiers のプライマリキー',
        ]);
        $table->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('chunks');
        $table->changeColumn('refined_chunk_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'comment' => 'chunks のプライマリキー',
        ]);
        $table->changeColumn('chunk_rarity_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'comment' => 'chunk_rarities のプライマリキー',
        ]);
        $table->changeColumn('component_tier_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'signed' => false,
            'comment' => 'component_tiers のプライマリキー',
        ]);
        $table->update();
    }
}
