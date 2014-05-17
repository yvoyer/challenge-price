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
 * Class PricePerKilogramStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class PricePerKilogramStrategy implements PurchaseStrategy
{
    /**
     * @var int
     */
    private $pricePerKilo;

    /**
     * @param int $pricePerKilo
     */
    public function __construct($pricePerKilo)
    {
        $this->pricePerKilo = $pricePerKilo;
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
            $customer->removeMoney($product->getWeight() * $this->pricePerKilo);
        }

        return new ProductCollection();
    }
}
 