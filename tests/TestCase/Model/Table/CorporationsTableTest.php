<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporationsTable Test Case
 */
class CorporationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporationsTable
     */
    public $Corporations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.corporations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Corporations') ? [] : ['className' => CorporationsTable::class];
        $this->Corporations = TableRegistry::get('Corporations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Corporations);

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
