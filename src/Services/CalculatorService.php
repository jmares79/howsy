<?php

namespace App\Services;

use App\Interfaces\CalculatorInterface;

class CalculatorService implements CalculatorInterface
{
    /**
     * Method that calculates the amount of bottles thrown
     *
     * @param array $heights The array of heights of the bottles. Minimum elements should be 1
     *
     * @return integer The amount of bottles thrown
     */
    public function calculate($heights)
    {
        $amount = 0;
        $maxHeight = max($heights);

        foreach ($heights as $height) {
            if (!is_numeric($height)) {
                continue;
            }

            if ($height == $maxHeight) $amount++;    
        }

        return $amount;
    }
}
