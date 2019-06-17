<?php

namespace App\Services;

use App\Interfaces\CalculatorInterface;

class CalculatorService implements CalculatorInterface
{
	public function calculate($bottles, $heights)
	{
		$heightList = explode(",", $heights);

		
	}
}