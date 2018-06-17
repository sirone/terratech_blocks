<?php
use Migrations\AbstractMigration;

class CreateRecipes extends AbstractMigration
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
        $table = $this->table('recipes', ['signed' => false]);
        $table->addColumn('block_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => 'blocks のプライマリキー',
        ]);
        $table->addColumn('chunk_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'comment' => 'chunks のプライマリキー',
        ]);
        $table->addColumn('need', 'integer', [
            'signed' => false,
            'default' => 1,
            'limit' => 10,
            'null' => false,
            'comment' => 'block を構築するのに必要な chunk の個数',
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
        $table->create();
    }
}
