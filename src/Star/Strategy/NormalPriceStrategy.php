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
 * Class NormalPriceStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class NormalPriceStrategy implements PurchaseStrategy
{
    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     *
     * @return \Star\ProductCollection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        foreach ($collection->toArray() as $product) {
            $customer->removeMoney($product->getBasePrice());
        }

        return new ProductCollection();
    }
}
 