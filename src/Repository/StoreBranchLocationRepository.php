<?php

namespace App\Repository;

use App\Entity\StoreBranchLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StoreBranchLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreBranchLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreBranchLocation[]    findAll()
 * @method StoreBranchLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreBranchLocationRepository extends ServiceEntityRepository
{
    /**
     * StoreBranchLocationRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreBranchLocation::class);
    }
}
