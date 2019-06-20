<?php

namespace App\Interfaces;

interface CalculatorInterface
{
	/**
     * Method that calculates the amount of bottles thrown
     *
     * @param array $heights The array of heights of the bottles. Minimum elements should be 1
     *
     * @return integer The amount of bottles thrown
     */
	public function calculate($heights);
}