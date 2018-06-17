<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChunkRaritiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChunkRaritiesTable Test Case
 */
class ChunkRaritiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChunkRaritiesTable
     */
    public $ChunkRarities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chunk_rarities',
        'app.chunks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChunkRarities') ? [] : ['className' => ChunkRaritiesTable::class];
        $this->ChunkRarities = TableRegistry::get('ChunkRarities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChunkRarities);

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
