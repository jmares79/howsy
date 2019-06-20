<?php

use PHPUnit\Framework\TestCase;

use App\Services\ValidatorService;

class ValidatorServiceTest extends TestCase
{
    protected $validator;
    const DEFAULT_OUTPUT = 'No celebrities found';

    public function setUp()
    {
        $this->validator = new ValidatorService();
    }

    /**
     * @dataProvider inputProvider
     */
    public function testIsValidInput($bottles, $heights, $expected)
    {
        $thrownBottles = $this->validator->isValidInput($bottles, $heights);

        $this->assertEquals($expected, $thrownBottles);
    }

    /**
     * @dataProvider peopleProvider
     */
    public function testIsValidPersonInput($person, $expected)
    {
        $isValid = $this->validator->isValidPersonInput($person);

        $this->assertEquals($expected, $isValid);
    }

    /**
     * Test provider for testing the validator. 
     * It provides only valid inputs, as the validation occurs before the calculation happens,
     * hence for this problem is was set in the 'execute' method.
     */
    public function inputProvider()
    {
        return array(
            array(3, array(1,2,3), true),
            array(5, array(1, 2, 5, 5, 3), true),
            array('6', array(1,1,1,1,1,1), true), //'6' as a string
            array('C', array(1,1,1,1,1,1), false),
            array(null, array(1,1,1,1,1,1), false),
            array(null, null, false),
        );
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

        $hasMultipleInvalidCelebrities = array(
            'a' => ['b', 'c', 'd', 'e'],
            'b' => [],
            'c' => ['b', 'a', 'e'],
            'd' => ['b', 'e'],
            'e' => []
        );

        $emptyPeople = array();

        return array(
            array($hasCelebrity, true),
            array($hasNoCelebrity, true),
            array($hasMultipleInvalidCelebrities, false),
            array($emptyPeople, false),
        );
    }
}
