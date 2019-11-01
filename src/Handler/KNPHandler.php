<?php

namespace App\Handler;

use Knp\Component\Pager\PaginatorInterface;

/**
 * Class KNPHandler
 *
 * @package App\Handler
 */
class KNPHandler
{
    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * KNPHandler constructor.
     *
     * @param PaginatorInterface $paginator
     */
    public function __construct(PaginatorInterface $paginator) {
        $this->paginator = $paginator;
    }

    /**
     * Get paginator
     *
     * @return PaginatorInterface
     */
    public function getPaginator(): PaginatorInterface
    {
        return $this->paginator;
    }
}
