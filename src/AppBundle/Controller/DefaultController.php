<?php

namespace AppBundle\Controller;

use AppBundle\Service\BoxService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, BoxService $boxService)
    {
        $boxes = $boxService->getBoxes();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'boxes' => $boxes,
        ]);
    }
}
