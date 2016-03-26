<?php

namespace AppBundle\User;

use AppBundle\Entity\User;
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

    /**
     * Calculate constructor.
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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
