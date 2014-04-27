<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star\Strategy;

use Star\Customer;
use Star\PriceStrategy;
use Star\ProductCollection;

/**
 * Class CompositeStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class CompositeStrategy implements PriceStrategy
{
    /**
     * @var PriceStrategy[]
     */
    private $strategies = array();

    /**
     * @param array $strategies
     */
    public function __construct($strategies = array())
    {
        foreach ($strategies as $strategy) {
            $this->addStrategy($strategy);
        }
    }

    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        foreach ($this->strategies as $strategy) {
            $strategy->buy($customer, $collection);
        }
    }

    /**
     * @param PriceStrategy $strategy
     */
    public function addStrategy(PriceStrategy $strategy)
    {
        $this->strategies[] = $strategy;
    }
}
 