<?php

namespace AppBundle\EventListner;

use AppBundle\Entity\Article;
use AppBundle\Event\BlogArticleEvent;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class NewArticle
 * @package AppBundle\EventListner
 */
class NewArticle
{
    private $mailer;

    /**
     * NewArticle constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Event $event
     */
    public function onArticleNew(BlogArticleEvent $event)
    {
        /** @var Article $article */
        $article = $event->getArticle();

        $message = \Swift_Message::newInstance()
            ->setSubject('New Article')
            ->setFrom('info@example.com')
            ->setTo('mrossi@example.com')
            ->setBody('Hey, this is a new Article ' . $article->getTitle())
        ;

        $this->mailer->send($message);
    }
}
