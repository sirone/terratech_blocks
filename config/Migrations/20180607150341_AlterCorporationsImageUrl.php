<?php
use Migrations\AbstractMigration;

class AlterCorporationsImageUrl extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('corporations');
        $table->changeColumn('image_url', 'string', [
            'null' => true,
        ]);
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('corporations');
        $table->changeColumn('image_url', 'string', [
            'null' => false,
        ]);
    }
}
