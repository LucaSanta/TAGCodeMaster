<?php

namespace AppBundle\Twig;

/**
 * Class SumExtension
 * @package AppBundle\Twig
 */
class SumExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        $test = $this;
        return array(
            new \Twig_SimpleFilter('sum', array($this, 'sumFilter')),
        );
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function sumFilter($numbersData)
    {
        $numbers = explode(",", $numbersData);
        $total = 0;

        foreach($numbers as $number)
        {
            $total = $total + $number;
        }

        return $total;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_sum';
    }
}
