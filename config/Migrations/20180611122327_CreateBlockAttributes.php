<?php
use Migrations\AbstractMigration;

class CreateBlockAttributes extends AbstractMigration
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
        $table = $this->table('block_attributes', ['signed' => false]);
        $table->addColumn('block_id', 'integer', [
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('attribute_id', 'integer', [
            'limit' => 10,
            'null' => false,
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
            'block_id',
            'attribute_id',
        ], [
            'name' => 'UNIQUE_BLOCK_ATTRIBUTE',
            'unique' => true,
        ]);
        $table->create();
    }
}
