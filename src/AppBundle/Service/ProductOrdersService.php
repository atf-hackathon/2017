<?php

namespace AppBundle\Service;


use AppBundle\Entity\ProductOrder;
use Doctrine\ORM\EntityManager;

class ProductOrdersService
{
    /** @var EntityManager */
    protected $manager;

    /**
     * BoxService constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository() {
        return $this->manager->getRepository(ProductOrder::class);
    }
}
