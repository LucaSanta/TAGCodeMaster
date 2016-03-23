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
        $titleWithHtml = "<b>Titolo con html</b>";
        return $this->render('twig/index.html.twig', [
            'user' => [
                'name' => 'Mario Rossi'
            ],
            'title' => $titleWithHtml
        ]);
    }
}
