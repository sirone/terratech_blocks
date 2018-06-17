<?php
use Migrations\AbstractMigration;

class AlterBlocksAddCorporationId extends AbstractMigration
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
        $table = $this->table('blocks');
        $table->addColumn('corporation_id', 'integer', [
            'signed' => false,
            'limit' => 10,
            'null' => false,
            'after' => 'attribute_id',
            'comment' => 'corporations のプライマリキー',
        ]);
        $table->update();
    }
}
