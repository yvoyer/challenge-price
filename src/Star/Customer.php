<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star;

/**
 * Class Customer
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star
 */
class Customer
{
    /**
     * @var int
     */
    private $cash = 20.00;

    /**
     * Returns the Cash.
     *
     * @return int
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param $amount
     */
    public function removeMoney($amount)
    {
        $this->cash -= $amount;
    }
}
 