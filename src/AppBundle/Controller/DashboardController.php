<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('AppBundle:Dashboard:index.html.twig', [
                'user' => $user,
                'articles' => $articles
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Impossibile accedere a questa pagina!');

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article, [
            'validation_groups' => [
                'Default',
                'add_article'
            ]
        ]);
        $form->handleRequest($request);
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $article->setCreated(new \DateTime());
            $article->setUser($user);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('AppBundle:Dashboard:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->find($request->get('id'));

        $this->denyAccessUnlessGranted(['edit'], $article, 'Impossibile accedere a questa risorsa!');

        if(!$article) {
            throw $this->createNotFoundException('The article does not exist');
        }
        $form = $this->createForm(ArticleType::class, $article, [
            'validation_groups' => [
                'Default',
                'edit_article'
            ]
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('dashboard');
        }
        return $this->render('AppBundle:Dashboard:edit.html.twig', [
            'form'    => $form->createView(),
            'article' => $article
        ]);
    }
}
