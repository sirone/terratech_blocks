<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComponentTiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComponentTiersTable Test Case
 */
class ComponentTiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComponentTiersTable
     */
    public $ComponentTiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.component_tiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ComponentTiers') ? [] : ['className' => ComponentTiersTable::class];
        $this->ComponentTiers = TableRegistry::get('ComponentTiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComponentTiers);

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
