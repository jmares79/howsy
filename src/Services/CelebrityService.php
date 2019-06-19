<?php

namespace App\Services;

use App\Interfaces\CelebrityInterface;

class CelebrityService implements CelebrityInterface
{
    /**
     *  {@inheritDoc}
     */
    public function find($people)
    {
        $celebrity = '';
        $potentialCelebrity = $this->findPotentialCelebrities($people);

        if ($this->isCelebrity($people, $celebrity)) {
            $celebrities[] = $celebrity;               
        }

        return $celebrities;
    }

    /**
     * Method to check if any of the elements of the array has 0 friends, which is the 
     * mandatory characteristic for being a celebrity
     *
     * @param array $people The whole array to be checked
     */
    protected function findPotentialCelebrity($people)
    {
        /*
         * @var array with the name/id of the potential celebrities
         */
        $potentialCelebrities = [];

        foreach ($people as $id => $person) {
            if (count($person) == 0) {
                $potentialCelebrities[] = $id;
            }
        }

        return $potentialCelebrities;       
    }

    /**
     * Checks if a candidate to be a celebrity is actually one, by checking its known 
     * for the rest of the people in the array
     *
     * @param array $people The whole array to be checked
     */
    protected function isCelebrity($people, $candidate)
    {

    }
}
