<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use App\Interfaces\CalculatorInterface;
use App\Services\ValidatorService;
use App\Exceptions\InvalidInputArguments;
use App\Exceptions\InvalidInputException;

class InputCommand extends Command
{
	// the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:input-data';
    const DEFAULT_OUTPUT = 0;

    /**
     * Service in charge of calculating the hitting of balls
     */
    private $calculatorManager;

    public function __construct(CalculatorInterface $calculator, ValidatorService $validator)
    {
        $this->calculatorManager = $calculator;
        $this->validator = $validator;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        	->setDescription('Calculates the amount of knocked bottles in a thrown')
        	->setHelp('
                Parses the number of bottles as the first parameter and 
                the its heights as a comma separated list as the second.
            ');

        $this->addArgument('bottles', InputArgument::REQUIRED, 'The number of bottles.');
        $this->addArgument('heights', InputArgument::REQUIRED, 'Comma separated list of the heights of the bottles.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bottles = $input->getArgument('bottles');
        $heights = explode(",", $input->getArgument('heights'));

        if (!$this->validator->isValidInput($bottles, $heights)) {
            $bottlesThrown = self::DEFAULT_OUTPUT;
        } else {
            $bottlesThrown = $this->calculatorManager->calculate($heights);
        }

        $output->writeln($bottlesThrown);
    }
}
