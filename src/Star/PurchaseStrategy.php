<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star;

/**
 * Class PurchaseStrategy
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star
 */
interface PurchaseStrategy
{
    /**
     * @param Customer $customer
     * @param ProductCollection $collection
     *
     * @return ProductCollection The non-processed products
     */
    public function buy(Customer $customer, ProductCollection $collection);
}
 