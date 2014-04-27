<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace Star;

/**
 * Class ProductCollection
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package Star
 */
class ProductCollection
{
    /**
     * @var Product[]
     */
    private $elements = array();

    /**
     * @param Product[] $products
     */
    public function __construct($products = array())
    {
        $this->addProducts($products);
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->elements[] = $product;
    }

    /**
     * @param array $products
     */
    public function addProducts(array $products)
    {
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    /**
     * @return Product[]
     */
    public function toArray()
    {
        return $this->elements;
    }
}
 