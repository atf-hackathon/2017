<?php

namespace AppBundle\Service;


use AppBundle\Entity\Box;
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

    /**
     * @param $params
     * @return bool
     */
    public function removeOrder($params) {
        /** @var ProductOrder $order */
        $order = $this->getRepository()->findOneBy([
            'id' => $params['id']
        ]);

        $order->setOrderStatus(false);

        $boxRepo = $this->manager->getRepository(Box::class);

        /** @var Box $box */
        $box = $boxRepo->findOneBy([
            'id' => $params['box_id']
        ]);
        $box->setAvailability(true);
        $box->setAvailabilityDate(new \DateTime());

        $this->manager->flush();

        return true;
    }
}
