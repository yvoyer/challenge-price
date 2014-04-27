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
 * Class QuantityForPriceOfOneStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class QuantityForPriceOfOneStrategy implements PriceStrategy
{
    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        $i = 0;
        foreach ($collection->toArray() as $product) {
            if ($i % 2 != 0) {
                $customer->removeMoney($product->getBasePrice());
            }
            $i ++;
        }
    }
}
 