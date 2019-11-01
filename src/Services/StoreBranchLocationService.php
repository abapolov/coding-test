<?php

namespace App\Services;

use App\Entity\StoreBranchLocation;
use App\Handler\EntityHandler;
use Doctrine\Common\Collections\Collection;

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
     * StoreBranchLocationService constructor.
     *
     * @param EntityHandler $entityHandler
     */
    public function __construct(EntityHandler $entityHandler)
    {
        $this->entityHandler = $entityHandler;
    }

    /**
     * @return StoreBranchLocation[]
     */
    public function getAllBranchLocations(): array
    {
        return $this
            ->entityHandler
            ->getRepository(StoreBranchLocation::class)
            ->findAll();
    }
}