<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShowsTable Test Case
 */
class ShowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShowsTable
     */
    public $Shows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shows',
        'app.months',
        'app.dropdowns',
        'app.assignments',
        'app.signups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shows') ? [] : ['className' => ShowsTable::class];
        $this->Shows = TableRegistry::get('Shows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shows);

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
