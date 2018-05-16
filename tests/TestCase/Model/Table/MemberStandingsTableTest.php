<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberStandingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberStandingsTable Test Case
 */
class MemberStandingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberStandingsTable
     */
    public $MemberStandings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.member_standings',
        'app.user_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MemberStandings') ? [] : ['className' => MemberStandingsTable::class];
        $this->MemberStandings = TableRegistry::get('MemberStandings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MemberStandings);

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
