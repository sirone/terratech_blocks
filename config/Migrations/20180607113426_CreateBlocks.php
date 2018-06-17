<?php
use Migrations\AbstractMigration;

class CreateBlocks extends AbstractMigration
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
        $table = $this->table('blocks', ['signed' => false]);
        $table->addColumn('identifier', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'Unity 上の識別子 (GCArticulatedDrill_423 等)',
        ]);
        $table->addColumn('category_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => 'categories のプライマリキー',
        ]);
        $table->addColumn('rarity_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => 'rarities のプライマリキー',
        ]);
        $table->addColumn('grade', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => 'グレード',
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => '名称',
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
            'comment' => '説明',
        ]);
        $table->addColumn('image_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'comment' => '画像 URL',
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
