<?php

namespace AppBundle\Service;

use AppBundle\Entity\ProductOrder;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class ProductOrdersService
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
        return $this->manager->getRepository(ProductOrder::class);
    }
}
