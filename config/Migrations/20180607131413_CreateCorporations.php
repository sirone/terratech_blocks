<?php
use Migrations\AbstractMigration;

class CreateCorporations extends AbstractMigration
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
        $table = $this->table('corporations', ['signed' => false]);
        $table->addColumn('identifier', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'Unity 上の識別子 (GSO, VEN, HE 等)',
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => '会社名',
        ]);
        $table->addColumn('image_url', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'comment' => '画像 URL',
        ]);
        $table->addColumn('is_planned', 'boolean', [
            'default' => true,
            'comment' => '計画中か? false なら実装済',
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
