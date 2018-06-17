<?php
use Migrations\AbstractMigration;

class CreateRarities extends AbstractMigration
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
        $table = $this->table('rarities', ['signed' => false]);
        $table->addColumn('identifier', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'Unity 上の識別子 (Common, Uncommon 等)',
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'レアリティ名',
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
