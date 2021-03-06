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
 * Class PercentRebateStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class PercentRebateStrategy implements PurchaseStrategy
{
    /**
     * @var int
     */
    private $percent;

    /**
     * @param int $percent
     */
    public function __construct($percent)
    {
        $this->percent = $percent / 100;
    }

    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     *
     * @return \Star\ProductCollection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        foreach ($collection->toArray() as $product) {
            $customer->removeMoney($product->getBasePrice() * $this->percent);
        }

        return new ProductCollection();
    }
}
 