<?php

namespace AppBundle\Service;


use AppBundle\Entity\Box;
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

    /**
     * @param array $filters
     * @return array
     */
    public function findAll($filters = []) {
        return $this->getRepository()->getAll($filters);
    }

    /**
     * @param $params
     * @return bool
     */
    public function saveOrder($params) {
        /** @var ProductOrder $order */
        $order = $this->getRepository()->findOneBy([
            'id' => $params['id']
        ]);

        $order->setOrderStatus(true);

        $boxRepo = $this->manager->getRepository(Box::class);

        /** @var Box $box */
        $box = $boxRepo->findOneBy([
            'id' => $params['box_no']
        ]);
        $box->setAvailability(false);
        $box->setAvailabilityDate(new \DateTime());

        $this->manager->flush();

        return true;
    }
}