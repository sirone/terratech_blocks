<?php
use Migrations\AbstractMigration;

class AddPurchasePriceAndSalePriceToBlocks extends AbstractMigration
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
        $table->addColumn('purchase_price', 'integer', [
            'limit' => 10,
            'null' => true,
            'after' => 'image_url',
            'signed' => false,
            'comment' => '購入価格'
        ]);
        $table->addColumn('sale_price', 'integer', [
            'limit' => 10,
            'null' => true,
            'after' => 'purchase_price',
            'signed' => false,
            'comment' => '売却価格'
        ]);
        $table->update();
    }
}
