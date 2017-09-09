<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Class BoxService
 * @package AppBundle\Service
 */
class BoxService
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
     * @return \AppBundle\Repository\BoxRepository|\Doctrine\ORM\EntityRepository
     */
    public function getRepository() {
        return $this->manager->getRepository(\AppBundle\Entity\Box::class);
    }

    /**
     * @return array
     */
    public function getBoxes()
    {
        return $this->getRepository()->findBy(['active' => 1]);
    }
}
