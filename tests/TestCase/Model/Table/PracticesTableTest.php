<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracticesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracticesTable Test Case
 */
class PracticesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PracticesTable
     */
    public $Practices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.practices',
        'app.months',
        'app.checkins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Practices') ? [] : ['className' => PracticesTable::class];
        $this->Practices = TableRegistry::get('Practices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Practices);

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
