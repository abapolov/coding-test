<?php

namespace App\Services;

use App\Entity\StoreBranchLocation;
use App\Handler\EntityHandler;
use App\Handler\KNPHandler;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Class StoreBranchLocationService
 *
 * @package App\Services
 */
class StoreBranchLocationService
{
    /**
     * @var EntityHandler
     */
    public $entityHandler;

    /**
     * @var KNPHandler
     */
    public $KNPHandler;

    /**
     * StoreBranchLocationService constructor.
     *
     * @param EntityHandler $entityHandler
     * @param KNPHandler    $KNPHandler
     */
    public function __construct(EntityHandler $entityHandler, KNPHandler $KNPHandler)
    {
        $this->entityHandler = $entityHandler;
        $this->KNPHandler    = $KNPHandler;
    }

    /**
     * @param array $params
     *
     * @return PaginationInterface
     */
    public function getAllBranchLocations(array $params): PaginationInterface
    {
        return $this
            ->KNPHandler
            ->getPaginator()
            ->paginate(
                $this
                    ->entityHandler
                    ->getRepository(StoreBranchLocation::class)
                    ->findAllQuery(
                        $params['search_word']
                    ),
                $params['page'],
                15
            );
    }
}