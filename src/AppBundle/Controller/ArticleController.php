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
        return $this->render('article/index.html.twig', [
            'slug' => $request->get('slug')
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function defaultAction(Request $request)
    {
        return $this->render('article/index.html.twig', [
            'slug' => $request->get('slug')
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageAction(Request $request)
    {
        return $this->render('article/page.html.twig', [
            'page' => $request->get('page')
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function languageAction(Request $request)
    {
        return $this->render('article/language.html.twig', [
            '_locale' => $request->get('_locale')
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mobileAction(Request $request)
    {
        return $this->render('article/mobile.html.twig', []);
    }
}
