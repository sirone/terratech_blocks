<?php
use Migrations\AbstractMigration;

class CreateChunks extends AbstractMigration
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
        $table = $this->table('chunks', ['signed' => false]);
        $table->addColumn('identifier', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'Unity 上の識別子 (BosoniaIngot 等)',
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => '材料名',
        ]);
        $table->addColumn('description', 'text', [
            'null' => false,
            'comment' => '説明',
        ]);
        $table->addColumn('image_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'comment' => '画像 URL',
        ]);
        $table->addColumn('sell_price', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,
            'comment' => '売却額',
        ]);
        $table->addColumn('refined_chunk_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'comment' => 'chunks のプライマリキー',
        ]);
        $table->addColumn('chunk_rarity_id', 'integer', [
            'limit' => 10,
            'null' => false,
            'comment' => 'chunk_rarities のプライマリキー',
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
            'comment' => '作成日',
        ]);
        $table->addColumn('modified', 'timestamp', [
            'default' => null,
            'null' => false,
            'comment' => '更新日',
        ]);
        $table->addIndex([
            'identifier',
        ], [
            'name' => 'UNIQUE_IDENTIFIER',
            'unique' => true,
        ]);
        $table->create();
    }
}
