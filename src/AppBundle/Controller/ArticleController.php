<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArticleController
 * @package AppBundle\Controller
 */
class ArticleController extends Controller
{
    /**
     * @Route("/article/{slug}", name="show_article")
     */
    public function indexAction(Request $request)
    {
        return $this->render('article/index.html.twig', [
            'slug' => $request->get('slug')
        ]);
    }
}
