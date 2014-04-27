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
 * Class PricePerKilogramStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class PricePerKilogramStrategy implements PriceStrategy
{
    /**
     * @var int
     */
    private $price;

    /**
     * @param int $price
     */
    public function __construct($price)
    {
        $this->price = $price;
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
            $customer->removeMoney($product->getWeight() * $this->price);
        }

        return new ProductCollection();
    }
}
 