<?php

namespace Tests\AppBundle\Service;

use AppBundle\Repository\ProductRepository;
use AppBundle\Service\ProductService;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    public function testGetBoxesWillAlwaysFindByActive()
    {
        /** @var ProductRepository|\PHPUnit_Framework_MockObject_MockObject $repositoryMock */
        $repositoryMock = $this->getMockBuilder(ProductRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        /** @var ObjectManager|\PHPUnit_Framework_MockObject_MockObject $entityManagerMock */
        $entityManagerMock = $this->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManagerMock->expects($this->any())
            ->method('getRepository')
            ->willReturn($repositoryMock);

        $productService = new ProductService($entityManagerMock);

        $this->assertEquals($repositoryMock, $productService->getRepository());
    }
}
