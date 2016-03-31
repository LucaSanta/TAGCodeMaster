<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 */
class ArticleController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articleObjectOne = $em->getRepository('AppBundle:Article')->find(1);
        $articleObjectTwo = $em->find('AppBundle:Article', 1);

        $articles = $em->getRepository('AppBundle:Article')->findAll();
        $articleOneBy = $em->getRepository('AppBundle:Article')->findOneBy([
            'title' => 'titolo 1'
        ]);
        $articlesActive = $em->getRepository('AppBundle:Article')->findBy([
            'status' => 1
        ]);

        $articleByTile = $em->getRepository('AppBundle:Article')->findOneByTitle("titolo 1");

        $articlesForThisMonth = $em->getRepository('AppBundle:Article')->getArticlesForThisMonth();

        return $this->render(':article:index.html.twig', []);
    }
}
