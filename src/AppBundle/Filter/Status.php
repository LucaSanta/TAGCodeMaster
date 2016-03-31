<?php

namespace AppBundle\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class Status
 * @package AppBundle\Filter
 */
class Status extends SQLFilter
{
    /**
     * @param ClassMetadata $targetEntity
     * @param string $targetTableAlias
     * @return string
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$targetEntity->reflClass->implementsInterface('AppBundle\Entity\StatusInterface')) {
            return "";
        }

        return $targetTableAlias.'.status = 1';
    }
}
