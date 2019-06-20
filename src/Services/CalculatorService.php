<?php

namespace App\Services;

use App\Interfaces\CalculatorInterface;

class CalculatorService implements CalculatorInterface
{
    /**
     *  {@inheritDoc}
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
