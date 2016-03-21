<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $format  = $request->get('_format');
        $data = [
            'locale' => $request->get('_locale'),
            'year'   => $request->get('year'),
            'title'  => $request->get('title'),
            'format' => $format
        ];

        if($format == "json") {
            return new JsonResponse($data);
        } else {
            return $this->render('article/index.html.twig', $data);
        }
    }
}
