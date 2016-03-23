<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TwigController
 * @package AppBundle\Controller
 */
class TwigController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('twig/index.html.twig', [
            'articleDate' => new \DateTime('2016/03/22')
        ]);
    }
}
