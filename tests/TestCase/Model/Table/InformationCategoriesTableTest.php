<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformationCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformationCategoriesTable Test Case
 */
class InformationCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InformationCategoriesTable
     */
    public $InformationCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.information_categories',
        'app.information'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InformationCategories') ? [] : ['className' => InformationCategoriesTable::class];
        $this->InformationCategories = TableRegistry::get('InformationCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InformationCategories);

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
