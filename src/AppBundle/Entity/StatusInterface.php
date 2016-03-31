<?php

namespace AppBundle\Entity;

/**
 * Interface StatusInterface
 * @package AppBundle\Entity
 */
interface StatusInterface
{
    public function isStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setStatus($status);
}
