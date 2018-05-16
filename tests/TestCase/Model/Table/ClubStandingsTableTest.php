<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClubStandingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClubStandingsTable Test Case
 */
class ClubStandingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClubStandingsTable
     */
    public $ClubStandings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.club_standings',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClubStandings') ? [] : ['className' => ClubStandingsTable::class];
        $this->ClubStandings = TableRegistry::get('ClubStandings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClubStandings);

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
