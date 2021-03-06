<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonthsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonthsTable Test Case
 */
class MonthsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonthsTable
     */
    public $Months;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.months',
        'app.practices',
        'app.shows',
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
        $config = TableRegistry::exists('Months') ? [] : ['className' => MonthsTable::class];
        $this->Months = TableRegistry::get('Months', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Months);

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
