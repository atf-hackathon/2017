<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\ProductOrder;
use AppBundle\Service\ProductService;
use AppBundle\Service\ProductOrdersService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
    /**
     * @Route("/products", name="orders-listing")
     *
     * @param Request $request
     * @param ProductService $productService
     * @return JsonResponse
     */
    public function indexAction(Request $request, ProductService $productService)
    {
        $response = [];
        /** @var Product $product */
        foreach ($productService->getRepository()->findAll() as $product) {
            $response[] = [
                'id' => $product->getId(),
                'name' => $product->getName()
            ];
        }

        return new JsonResponse([ 'data' => $response ]);
    }

    /**
     * @Route("/orders", name="product-orders-listing")
     *
     * @param Request $request
     * @param ProductOrdersService $ordersService
     * @return JsonResponse
     */
    public function orderedAction(Request $request, ProductOrdersService $ordersService) {
        $response = [];
        /** @var ProductOrder $productOrder */
        foreach ($ordersService->getRepository()->findAll() as $productOrder) {
            $response[] = [
                'id' => $productOrder->getId(),
                'product_id' => $productOrder->getProduct()->getId(),
                'product' => $productOrder->getProduct()->getName(),
                'box' => $productOrder->getBox()->getId()
            ];
        }

        return new JsonResponse([ 'data' => $response ]);
    }
}
