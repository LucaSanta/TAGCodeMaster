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
     * @param EntityManager $em
     */
    public function setEntityManger(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManger()
    {
        return $this->em;
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function create(User $user)
    {
        $em = $this->getEntityManger();
        // my logic service ...
        $user->setFullname('Mario Rossi');
        $user->setEmail('m.rossi@example.com');
        $em->persist($user);
        $em->flush();
    }
}
