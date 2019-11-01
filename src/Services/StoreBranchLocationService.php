<?php

namespace App\Services;

use App\Handler\EntityHandler;

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
}