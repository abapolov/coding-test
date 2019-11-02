<?php

namespace App\Command;

use App\Entity\StoreBranchLocation;
use App\Handler\EntityHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class AverageEmployeesCommand
 *
 * @package App\Command
 */
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
            ->setDescription('This command allows us calculate average of store branch location employees.')
            ->addArgument('ids', InputArgument::OPTIONAL | InputArgument::IS_ARRAY, 'Ids array. E.g. 1 2 3');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io          = new SymfonyStyle($input, $output);
        $resultArray = $this
            ->entityHandler
            ->getRepository(StoreBranchLocation::class)
            ->getAverageOfEmployees($input->getArgument('ids'));

        $io->note(sprintf('Total store branch locations: %s', $resultArray[0]['count']));
        $io->success('Store branch locations employees average: ' . round($resultArray[0]['averageNumber']));
    }
}