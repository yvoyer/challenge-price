<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star;

/**
 * Class Product
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star
 */
class Product
{
    /**
     * @var int
     */
    private $basePrice = 1.00;

    /**
     * @var int
     */
    private $weight = 2;

    /**
     * Returns the BasePrice.
     *
     * @return int
     */
    public function getBasePrice()
    {
        return $this->basePrice;
    }

    /**
     * Returns the Weight.
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

}
 