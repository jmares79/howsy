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
     * Validates the persons array to be correctly created with at most 1 celebrity and set
     *
     * @param array $persons Array of persons to be checked for a celebrity
     *
     * @return bool
     */
    public function isValidPersonInput($persons)
    {
        if (!isset($persons) || empty($persons)) {
            return false;
        }

        /**
         * @var array with the name/id of the potential celebrities
         */
        $potentialCelebrities = [];

        foreach ($persons as $id => $person) {
            if (count($person) == 0) {
                $potentialCelebrities[] = $id;
            }
        }

        if (count($potentialCelebrities) > 1) {
            return false;
        }

        return true;
    }
}
