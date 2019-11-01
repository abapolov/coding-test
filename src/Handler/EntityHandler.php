<?php

namespace App\Handler;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Class EntityHandler
 *
 * @package App\Handler
 */
class EntityHandler
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * EntityHandler constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Get repository
     *
     * @param string $class
     *
     * @return EntityRepository
     */
    public function getRepository(string $class): EntityRepository
    {
        return $this
            ->entityManager
            ->getRepository($class);
    }

    /**
     * Full save
     *
     * @param $object
     *
     * @return mixed
     * @throws ORMException
     */
    public function fullSave($object)
    {
        $this->entityManager->persist($object);
        $this->flush();

        return $object;
    }

    /**
     * Remove
     *
     * @param $object
     *
     * @throws ORMException
     */
    public function remove($object)
    {
        $this->entityManager->remove($object);
        $this->flush();
    }

    /**
     * Persist
     *
     * @param $object
     *
     * @return mixed
     * @throws ORMException
     */
    public function persist($object)
    {
        $this->entityManager->persist($object);

        return $object;
    }

    /**
     * Flush
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function flush()
    {
        $this->entityManager->flush();
    }
}
