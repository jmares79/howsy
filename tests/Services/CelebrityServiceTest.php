<?php

use PHPUnit\Framework\TestCase;

use App\Services\CelebrityService;
use App\Services\ValidatorService;

class CelebrityServiceTest extends TestCase
{
    protected $celebrity;

    public function setUp()
    {
        $this->celebrity = new CelebrityService();
    }

    /**
     * @dataProvider peopleProvider
     */
    public function testFind($people, $expected)
    {
        $celebrities = $this->celebrity->find($people);

        $this->assertEquals($celebrities, $thrownBottles);
    }

    /**
     * Test provider for testing the celebrity service. 
     * It provides only valid inputs, as the validation occurs before the calculation happens,
     * hence for this problem is was set in the 'execute' method.
     */
    public function peopleProvider()
    {
        $hasCelebrity = array(
            'a' => ['b', 'c', 'd'],
            'b' => [],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );

        $hasNoCelebrity = array(
            'a' => ['b', 'c', 'd'],
            'b' => ['d'],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );

        $hasPotentialCelebrities = array(
            'a' => ['b', 'c', 'd', 'e'],
            'b' => [],
            'c' => ['b', 'a', 'e'],
            'd' => ['b', 'e'],
            'e' => []
        );

        $emptyPeople = array();

        return array(
            array($hasCelebrity, 'b'),
            array($hasNoCelebrity, ''),
            array($hasCelebrity, 'b'),
        );
    }
}
