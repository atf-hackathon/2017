<?php

namespace AppBundle\Service;


use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;

class ProductService
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
        return $this->manager->getRepository(Product::class);
    }
}
