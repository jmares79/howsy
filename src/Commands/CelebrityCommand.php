<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use App\Interfaces\CelebrityInterface;
use App\Services\ValidatorService;

class CelebrityCommand extends Command
{
	// the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:celebrities';
    const DEFAULT_OUTPUT = 'No celebrities found';

    /**
     * Service in charge of finding celebrities
     */
    private $celebrityManager;

    public function __construct(CelebrityInterface $manager, ValidatorService $validator)
    {
        $this->celebrityManager = $manager;
        $this->validator = $validator;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Finds the celebrity(ies) from the passed input, if any');
    }

    /**
     * Executes the command for finding celebrities
     *
     * @param InputInterface $input Symfony class for handling everything related to CLI input
     * @param OutputInterface $output Symfony class for handling everything related to CLI output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $persons = $this->fakePersons();
        $celebrities = [];

        if ($this->validator->isValidPersonInput($persons)) {
            $celebrities = $this->celebrityManager->find($persons);
        }

        if (empty($celebrities)) {
            $celebrities = self::DEFAULT_OUTPUT;
        } else {
            $celebrities = implode(",", $celebrities);
        }

        $output->writeln($celebrities);
    }

    /**
     * Method that returns fake persons array, in order to avoid the CLI parsing.
     * TODO move to a CLI argument for production purposes
     */
    protected function fakePersons()
    {
        $hasCelebrity = array(
            'a' => ['b', 'c', 'd'],
            'b' => [],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );

        $hasNoCelebrity = array(
            'a' => ['b', 'c', 'd'],
            'b' => ['d'],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );

        $hasPotentialCelebrities = array(
            'a' => ['b', 'c', 'd', 'e'],
            'b' => [],
            'c' => ['b', 'a', 'e'],
            'd' => ['b', 'e'],
            'e' => []
        );

        return $hasCelebrity;
    }
}
