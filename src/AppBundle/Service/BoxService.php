<?php
namespace AppBundle\Service;

use AppBundle\Entity\Box;
use AppBundle\Repository\BoxRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

class BoxService
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
     * @return BoxRepository|ObjectRepository
     */
    public function getRepository() {
        return $this->manager->getRepository(Box::class);
    }

    /**
     * @return array
     */
    public function getBoxes()
    {
        return $this->getRepository()->findBy(['active' => 1]);
    }
}
