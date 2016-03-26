<?php

namespace AppBundle\User;

use AppBundle\Entity\User;
use AppBundle\Mail\MailManager;
use Doctrine\ORM\EntityManager;

/**
 * Class UserManager
 * @package AppBundle\User
 */
class UserManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /** @var  \Swift_Mailer */
    private $mail;

    /**
     * Calculate constructor.
     */
    public function __construct(EntityManager $em, \Swift_Mailer $mail = null)
    {
        $this->em = $em;

        if(!is_null($mail)) {
            $this->mail = $mail;
        }
    }


    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function create(User $user)
    {
        // my logic service ...
        $user->setFullname('Mario Rossi');
        $user->setEmail('m.rossi@example.com');
        $this->em->persist($user);
        $this->em->flush();
    }
}
