<?php
use Migrations\AbstractMigration;

class CreateMaintainers extends AbstractMigration
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
        $table = $this->table('maintainers', ['signed' => false]);
        $table->addColumn('username', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'メンテナ名',
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'パスワード',
        ]);
        $table->addColumn('email', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => '連絡先メールアドレス',
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
            'username', 'email'
        ], [
            'unique' => true,
        ]);
        $table->create();
    }
}
