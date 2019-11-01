<?php

namespace App\Command;

use App\Handler\EntityHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class AverageEmployeesCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'calculate:avg-employees';

    /**
     * @var EntityHandler
     */
    private $entityHandler;

    /**
     * AverageEmployeesCommand constructor.
     *
     * @param EntityHandler $entityHandler
     * @param string|null   $name
     */
    public function __construct(EntityHandler $entityHandler, string $name = null)
    {
        $this->entityHandler = $entityHandler;
        parent::__construct($name);
    }

    /**
     * Configure Command
     */
    protected function configure()
    {
        $this
            ->setDescription('This command allows us calculate average of store branch location employees.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}