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
     * @param int $quantity
     * @param int $price
     */
    public function __construct($quantity, $price)
    {
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     *
     * @return ProductCollection
     */
    public function buy(Customer $customer, ProductCollection $collection)
    {
        if (count($collection->toArray()) < $this->quantity) {
            return $collection;
        }

        $i = 1;
        $amount = 0;
        $unProcessedProducts = new ProductCollection();

        foreach ($collection->toArray() as $product) {
            if ($i == $this->quantity) {
                $amount += $this->price;
            }

            if ($i > $this->quantity) {
                $unProcessedProducts->addProduct($product);
            }

            $i ++;
        }
        $customer->removeMoney($amount);

        return $this->buy($customer, $unProcessedProducts);
    }
}
 