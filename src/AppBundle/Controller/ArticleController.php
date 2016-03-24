<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        // replace this example code with whatever you need
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article, [
            'validation_groups' => [
                'Default',
                'add_article'
            ]
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if($form->get('saveArticle')->getData()) {
                $em = $this->getDoctrine()->getManager();
                $article->setCreated(new \DateTime());
                $em->persist($article);
                $em->flush();
            }

            return $this->redirectToRoute('_article');
        }

        return $this->render('article/add.html.twig', [
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

            if($form->get('saveArticle')->getData()) {
                $em->persist($article);
                $em->flush();
            }

            return $this->redirectToRoute('_article');
        }

        return $this->render('article/edit.html.twig', [
            'form'    => $form->createView(),
            'article' => $article
        ]);
    }
}
