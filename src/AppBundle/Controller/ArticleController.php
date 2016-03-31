<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 */
class ArticleController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Article:index.html.twig', array(
            'hello' => $this->get('session')->get('hello')
        ));
    }

}
