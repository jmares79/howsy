<?php

namespace App\Services;

class ValidatorService
{
	/**
     * Method that validates the input
	 *
	 * @param integer $bottles 
	 * @param array $heights
	 *
	 * @return bool
     */
	public function isValidInput($bottles, $heights)
	{
		if (!isset($bottles) || !isset($heights)) return false;

		if (count($heights) == 0) return false;

		if ($bottles != count($heights)) return false;

		if (!is_numeric($bottles)) return false;

		return true;
	}
}