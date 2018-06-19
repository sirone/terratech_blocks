<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComponentRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComponentRecipesTable Test Case
 */
class ComponentRecipesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComponentRecipesTable
     */
    public $ComponentRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.component_recipes',
        'app.chunks',
        'app.need_chunks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ComponentRecipes') ? [] : ['className' => ComponentRecipesTable::class];
        $this->ComponentRecipes = TableRegistry::get('ComponentRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComponentRecipes);

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
