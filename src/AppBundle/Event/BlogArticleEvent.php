<?php

namespace AppBundle\Event;

use AppBundle\Entity\Article;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class BlogArticleEvent
 * @package AppBundle\Event
 */
class BlogArticleEvent extends Event
{
    const NAME = 'article.new';

    protected $article;

    /**
     * BlogArticleEvent constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
