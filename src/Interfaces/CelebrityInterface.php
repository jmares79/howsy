<?php

namespace App\Interfaces;

interface CelebrityInterface
{
	/**
     * Method that finds celebrities in the input array
     *
     * @param array $people The array of people to check if there's any celebrity
     *
     * @return integer The amount of bottles thrown
     */
	public function find($people);
}