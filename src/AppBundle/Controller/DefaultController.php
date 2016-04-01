<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        //esempio di come recuperare l'url richiesto
        $request->getPathInfo();

        //esempio di come recuperare un parametro dalla query string [GET]
        $request->query->get('foo');

        //esempio di come recuperare un parametro da POST
        $request->request->get('bar', 'default value');

        //esempio di come recuperare le variabili SERVER
        $request->server->get('HTTP_HOST');

        //esempio di come recuperare un'istanza di UploadedFile identificata come file
        $request->files->get('file');

        //esempio di come recuperare un parametro dal COOKIE
        $request->cookies->get('PHPSESSID');

        //esempio di come recuperare l'header
        $request->headers->get('host');
        $request->headers->get('content_type');

        //esempio di come recuperare un array di lingue accettate dal client
        $request->getLanguages();

        return new Response();
    }
}
