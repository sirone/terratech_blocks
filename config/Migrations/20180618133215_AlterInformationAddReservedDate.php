<?php
use Migrations\AbstractMigration;

class AlterInformationAddReservedDate extends AbstractMigration
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
        $table = $this->table('information');
        $table->addColumn('reserved_at', 'timestamp', [
            'null' => true,
            'after' => 'information_category_id',
            'comment' => '公開予約日',
        ]);
        $table->update();
    }
}
