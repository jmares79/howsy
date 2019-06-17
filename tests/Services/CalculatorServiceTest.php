<?php

use PHPUnit\Framework\TestCase;

use App\Services\CalculatorService;

class CurrencyConverterServiceTest extends TestCase
{
    protected $mockedExchangeRateService;

    public function setUp()
    {
        $this->mockedExchangeRateService = $this->createMock(StaticCurrencyExchangeRateService::class);

        $this->currency = new CurrencyConverterService($this->mockedExchangeRateService);
    }

    /**
     * @dataProvider inputProvider
     */
    public function testConvertValidResults($amount, $rateInfo, $expected)
    {
        $this->mockedExchangeRateService
            ->method('getExchangeRate')
            ->willReturn($rateInfo);

        $converterAmount = $this->currency->convert($amount);

        $this->assertEquals($expected, $converterAmount);
    }

    public function inputProvider()
    {


    }
}
