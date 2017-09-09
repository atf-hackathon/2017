<?php

namespace AppBundle\Controller;

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
//        var_dump($productService->getRepository()->findAll()); die;
        return new JsonResponse(['data' => [[
                'id' => 1,
                'name' => 'Product 1'
            ], [
                'id' => 2,
                'name' => 'Product 2'
            ]]
        ]);
    }

    /**
     * @Route("/orders", name="orders-listing")
     *
     * @param Request $request
     * @param ProductOrdersService $ordersService
     */
    public function orderedAction(Request $request, ProductOrdersService $ordersService) {
        var_dump($ordersService->getRepository()->findAll()); die;
    }
}
