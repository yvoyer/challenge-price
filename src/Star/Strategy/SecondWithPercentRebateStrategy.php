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
 * Class SecondWithPercentRebateStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class SecondWithPercentRebateStrategy implements PurchaseStrategy
{
    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        $normalPrice = new NormalPriceStrategy();
        $percentRebate = new PercentRebateStrategy(50);
        $i = 0;
        foreach ($collection->toArray() as $product) {
            $currentCollection = new ProductCollection(array($product));
            if ($i % 2 === 0) {
                $normalPrice->buy($customer, $currentCollection);
            } else {
                $percentRebate->buy($customer, $currentCollection);
            }
            $i ++;
        }
    }
}
 