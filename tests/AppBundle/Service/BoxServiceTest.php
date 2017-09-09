<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Box;
use AppBundle\Repository\BoxRepository;
use AppBundle\Service\BoxService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class BoxServiceTest extends TestCase
{
    public function testGetBoxesWillAlwaysFindByActive()
    {
        $activeBoxes = [new Box()];
        /** @var BoxRepository|\PHPUnit_Framework_MockObject_MockObject $repositoryMock */
        $repositoryMock = $this->getMockBuilder(BoxRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $repositoryMock->expects($this->any())
            ->method('findBy')
            ->with(['active' => true])
            ->willReturn($activeBoxes);

        /** @var EntityManager|\PHPUnit_Framework_MockObject_MockObject $entityManagerMock */
        $entityManagerMock = $this->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManagerMock->expects($this->any())
            ->method('getRepository')
            ->willReturn($repositoryMock);

        $boxService = new BoxService($entityManagerMock);

        $foundActiveBoxes = $boxService->getBoxes();

        $this->assertEquals($activeBoxes, $foundActiveBoxes);
    }
}
