<?php

namespace App\Services;

use App\Interfaces\CelebrityInterface;

/**
 * Command for CLI functionality in order to find potential celebrities
 */
class CelebrityService implements CelebrityInterface
{
    /**
     *  {@inheritDoc}
     */
    public function find($people)
    {
        $celebrity = '';
        $potentialCelebrity = $this->findPotentialCelebrity($people);
        
        if (null == $potentialCelebrity) { 
            return $celebrity;
        }
        
        if ($this->isCelebrity($people, $potentialCelebrity)) {
            $celebrity = $potentialCelebrity;               
        }

        return $celebrity;
    }

    /**
     * Checks if any of the elements of the array has 0 friends, which is the 
     * mandatory characteristic for being a celebrity. As a precondition it needs
     * to be validated to check that has at most 1 candidate
     *
     * @param array $people The whole array to be checked
     */
    protected function findPotentialCelebrity($people)
    {
        /**
         * @var array with the name/id of the potential celebrities
         */
        $potentialCelebrity = null;

        foreach ($people as $id => $person) {
            if (count($person) == 0) {
                $potentialCelebrity = $id;
            }
        }

        return $potentialCelebrity;       
    }

    /**
     * Checks if a candidate to be a celebrity is actually one, 
     * by checking its known for the rest of the people in the array
     *
     * @param array $people The whole array to be checked
     * @param string $candidate The potential name of the candidate to be a celebrity
     *
     * @return bool Whether the candidate is a celebrity or not
     */
    protected function isCelebrity($people, $candidate)
    {
        $isCelebrity = true;

        foreach ($people as $name => $knownPeople) {
            if ($name != $candidate) {
                if (!in_array($candidate, $knownPeople)) {
                    $isCelebrity = false;
                }
            }
        }

        return $isCelebrity;
    }
}
