<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DashboardController
 * @package AppBundle\Controller
 */
class DashboardController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Impossibile accedere a questa pagina!');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('AppBundle:Dashboard:index.html.twig', [
                'user' => $user
            ]
        );
    }

}
