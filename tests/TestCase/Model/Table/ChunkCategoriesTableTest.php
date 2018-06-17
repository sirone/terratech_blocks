<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChunkCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChunkCategoriesTable Test Case
 */
class ChunkCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChunkCategoriesTable
     */
    public $ChunkCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chunk_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChunkCategories') ? [] : ['className' => ChunkCategoriesTable::class];
        $this->ChunkCategories = TableRegistry::get('ChunkCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChunkCategories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
