<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CalculateController
 * @package AppBundle\Controller
 */
class CalculateController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $totalPrice = $this->get('calculate')->sum(10, 10);

        return $this->render('calculate/index.html.twig', [
            'totalPrice' => $totalPrice
        ]);
    }
}
