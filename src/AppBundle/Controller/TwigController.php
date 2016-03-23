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
        $users = [
            [
                'name' => 'Mario',
                'surname' => 'Rossi'
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Bianchi'
            ],
            [
                'name' => 'Valentino',
                'surname' => 'Rossi'
            ]
        ];
        return $this->render('twig/index.html.twig', [
            'users' => $users
        ]);
    }
}
