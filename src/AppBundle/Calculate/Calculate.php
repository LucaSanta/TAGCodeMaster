<?php

namespace AppBundle\Calculate;

/**
 * Class Calculate
 * @package AppBundle\Calculate
 */
class Calculate
{
    private $dependencyOne;

    private $dependencyTwo;

    /**
     * Calculate constructor.
     */
    public function __construct($dependencyOne, $dependencyTwo)
    {
        $this->dependencyOne = $dependencyOne;
        $this->dependencyTwo = $dependencyTwo;
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function sum($x, $y)
    {
        return $x + $y;
    }
}
