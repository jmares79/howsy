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
        if (!$this->validator->isValidInput($bottles, $heights)) {
            $celebrities = self::DEFAULT_OUTPUT;
        } else {
            $bottlesThrown = $this->celebrityManager->find($heights);
        }

        $output->writeln($bottlesThrown);
    }

    /**
     * Method that returns fake persons array, in order to avoid the CLI parsing.
     * TODO move to a CLI argument for production purposes
     */
    protected fakePersons()
    {
        $person1 = array(
            'a' => ['b', 'c', 'd'],
            'b' => [],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );

        $person2 = array(
            'a' => ['b', 'c', 'd'],
            'b' => ['d'],
            'c' => ['b', 'a'],
            'd' => ['b'],
        );
        return array(
            $person1,
            $person2,
        );
    }
}
