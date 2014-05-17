<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star\Strategy;

use Star\Customer;
use Star\PurchaseStrategy;
use Star\ProductCollection;

/**
 * Class CompositeStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class CompositeStrategy implements PurchaseStrategy
{
    /**
     * @var PurchaseStrategy[]
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
     *
     * @return ProductCollection The non-processed products
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        foreach ($this->strategies as $strategy) {
            $collection = $strategy->buy($customer, $collection);
        }

        return $collection;
    }

    /**
     * @param PurchaseStrategy $strategy
     */
    public function addStrategy(PurchaseStrategy $strategy)
    {
        $this->strategies[] = $strategy;
    }
}
 