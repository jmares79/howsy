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

    /**
     * Validates the persons array
     *
     * @param array $persons Array of persons to be checkd for celebrities
     *
     * @return bool
     */
    public function isValidPersonInput($persons)
    {
        if (!isset($bottles) || !isset($heights)) return false;

        if (count($heights) == 0) return false;

        if ($bottles != count($heights)) return false;

        if (!is_numeric($bottles)) return false;

        return true;
    }
}