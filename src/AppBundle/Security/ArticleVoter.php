<?php
namespace AppBundle\Security;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * Class ArticleVoter
 * @package AppBundle\Security
 */
class ArticleVoter extends Voter
{
    const EDIT = 'edit';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::EDIT))) {
            return false;
        }

        // only vote on Article objects inside this voter
        if (!$subject instanceof Article) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Article object, thanks to supports
        /** @var Article $article */
        $article = $subject;

        switch($attribute) {
            case self::EDIT:
                return $this->canEdit($article, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    /**
     * @param Article $article
     * @param User $user
     * @return bool
     */
    private function canEdit(Article $article, User $user)
    {
        // this assumes that the data object has a getOwner() method
        // to get the entity of the user who owns this data object
        return $user === $article->getUser();
    }
}
