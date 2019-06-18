<?php

use PHPUnit\Framework\TestCase;

use App\Services\ValidatorService;

class ValidatorServiceTest extends TestCase
{
    protected $validator;

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
}
