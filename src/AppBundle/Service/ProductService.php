<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductService
{
    /** @var ObjectManager */
    protected $manager;

    /**
     * BoxService constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository() {
        return $this->manager->getRepository(Product::class);
    }
}
