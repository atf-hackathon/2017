<?php

namespace Tests\AppBundle\Service;

use AppBundle\Repository\ProductOrderRepository;
use AppBundle\Service\ProductOrdersService;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;

class ProductOrderServiceTest extends TestCase
{
    public function testGetBoxesWillAlwaysFindByActive()
    {
        /** @var ProductOrderRepository|\PHPUnit_Framework_MockObject_MockObject $repositoryMock */
        $repositoryMock = $this->getMockBuilder(ProductOrderRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        /** @var ObjectManager|\PHPUnit_Framework_MockObject_MockObject $entityManagerMock */
        $entityManagerMock = $this->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManagerMock->expects($this->any())
            ->method('getRepository')
            ->willReturn($repositoryMock);

        $productOrderService = new ProductOrdersService($entityManagerMock);

        $this->assertEquals($repositoryMock, $productOrderService->getRepository());
    }
}
