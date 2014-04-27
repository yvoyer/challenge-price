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
 * Class QuantityForPriceStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star\Strategy
 */
class QuantityForPriceStrategy implements PriceStrategy
{
    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $price;

    /**
     * @var PriceStrategy
     */
    private $remainingProductStrategy;

    /**
     * @param int $quantity
     * @param int $price
     * @param \Star\PriceStrategy $remainingProductStrategy
     */
    public function __construct($quantity, $price, PriceStrategy $remainingProductStrategy)
    {
        $this->quantity = $quantity;
        $this->price = $price;
        $this->remainingProductStrategy = $remainingProductStrategy;
    }

    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        if (count($collection->toArray()) < $this->quantity) {
            $this->remainingProductStrategy->buy($customer, $collection);
            return;
        }

        $i = 0;
        $unProcessedProducts = new ProductCollection();
        foreach ($collection->toArray() as $product) {
            if ($i >= $this->quantity) {
                $unProcessedProducts->addProduct($product);
            }
            $i ++;
        }

        $customer->removeMoney($this->price);
        $this->buy($customer, $unProcessedProducts);
    }
}
 