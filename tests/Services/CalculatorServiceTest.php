<?php

use PHPUnit\Framework\TestCase;

use App\Services\CalculatorService;
use App\Services\ValidatorService;

class CalculatorServiceTest extends TestCase
{
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new CalculatorService();
    }

    /**
     * @dataProvider inputProvider
     */
    public function testConvertValidResults($heights, $expected)
    {
        $thrownBottles = $this->calculator->calculate($heights);

        $this->assertEquals($expected, $thrownBottles);
    }

    /**
     * Test provider for testing the calculator. 
     * It provides only valid inputs, as the validation occurs before the calculation happens,
     * hence for this problem is was set in the 'execute' method.
     */
    public function inputProvider()
    {
        return array(
            array(array(2, 3, 4, 4, 5), 1),
            array(array(1,2,3), 1),
            array(array(1,1,1,1,1), 5),
        );
    }
}
