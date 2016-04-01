<?php

namespace AppBundle\EventListner;

use AppBundle\Entity\Article;
use AppBundle\Event\BlogArticleEvent;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class NewArticle
 * @package AppBundle\EventListner
 */
class NewArticleSubscriber implements EventSubscriberInterface
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
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            BlogArticleEvent::NAME => [
                ['sendMails', 10], // before
                ['postSocial', 5] //after
            ]
        ];
    }

    /**
     * @param Event $event
     */
    public function sendMails(BlogArticleEvent $event)
    {
        /** @var Article $article */
        $article = $event->getArticle();

        $message = \Swift_Message::newInstance()
            ->setSubject('New Article')
            ->setFrom('info@example.com')
            ->setTo('mrossi@example.com')
            ->setBody('Hey, this is a new Article ' . $article->getTitle())
        ;

        //$this->mailer->send($message);
    }

    public function postSocial(BlogArticleEvent $event)
    {
        //post on social networlk
        $a = 1;
        $b = $a;
    }

}
