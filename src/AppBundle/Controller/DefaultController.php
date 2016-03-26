<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Registrazione Confermata')
            ->setFrom('info@myapp.com')
            ->setTo('vincenzo.provenza89@gmail.com')
            ->setBody(
                $this->renderView(
                    ':email:confirm-register.html.twig',
                    ['name' => 'Mario Rossi']
                ),
                'text/html'
            )
        ;
        $this->get('mailer')->send($message);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
