<?php

namespace App\Repository;

use App\Entity\StoreBranchLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

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

    /**
     * @param string|null $searchWord
     *
     * @return Query
     */
    public function findAllQuery(?string $searchWord): Query
    {
        return $this
            ->createQueryBuilder('sbl')
            ->where(
                'sbl.name LIKE :search OR ' .
                'sbl.address LIKE :search OR ' .
                'sbl.numberOfEmployees LIKE :search'
            )
            ->setParameters([
                'search'  => '%' . $searchWord . '%'
            ])
            ->orderBy('sbl.id', 'DESC')
            ->getQuery();
    }

    /**
     * @param array|null $ids
     *
     * @return array
     */
    public function getAverageOfEmployees(array $ids = null): array
    {
        $qb = $this
            ->createQueryBuilder('sbl')
            ->select('avg(sbl.numberOfEmployees) as averageNumber, COUNT(sbl) as count');

        if ($ids) {
            $qb->where('sbl.id IN (:ids)')->setParameter('ids', $ids);
        }

        return $qb->getQuery()
            ->getArrayResult();
    }
}
