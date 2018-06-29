<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaintainersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaintainersTable Test Case
 */
class MaintainersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaintainersTable
     */
    public $Maintainers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.maintainers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Maintainers') ? [] : ['className' => MaintainersTable::class];
        $this->Maintainers = TableRegistry::getTableLocator()->get('Maintainers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Maintainers);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
