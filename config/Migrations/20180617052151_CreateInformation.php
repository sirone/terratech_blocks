<?php
use Migrations\AbstractMigration;

class CreateInformation extends AbstractMigration
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
        $table->addColumn('title', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => '題名',
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'comment' => '内容',
        ]);
        $table->addColumn('information_category_id', 'integer', [
            'default' => null,
            'limit' => 10,
            'comment' => 'information_categories のプライマリキー',
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
