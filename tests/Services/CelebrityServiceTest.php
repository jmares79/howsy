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
        $celebrity = $this->celebrity->find($people);

        $this->assertEquals($expected, $celebrity);
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

        return array(
            array($hasCelebrity, 'b'),
        );
    }
}
