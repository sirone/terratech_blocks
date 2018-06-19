<?php
use Migrations\AbstractMigration;

class CreateComponentRecipes extends AbstractMigration
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
        $table = $this->table('component_recipes', ['signed' => false]);
        $table->addColumn('chunk_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => '作成したい chunks のプライマリキー',
        ]);
        $table->addColumn('need_chunk_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => '材料となる chunks のプライマリキー',
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
            'chunk_id',
        ], [
            'name' => 'chunk_id',
        ]);
        $table->create();
    }
}
