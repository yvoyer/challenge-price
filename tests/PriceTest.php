<?php
/**
 * This file is part of the price-challenge project.
 * 
 * (c) Yannick Voyer (http://github.com/yvoyer)
 */

namespace tests;

use Star\Customer;
use Star\PriceStrategy;
use Star\Product;
use Star\ProductCollection;
use Star\Strategy\CompositeStrategy;
use Star\Strategy\NormalPriceStrategy;
use Star\Strategy\PercentRebateStrategy;
use Star\Strategy\PricePerKilogramStrategy;
use Star\Strategy\QuantityForPriceOfOneStrategy;
use Star\Strategy\QuantityForPriceStrategy;
use Star\Strategy\SecondWithPercentRebateStrategy;

/**
 * Class PriceTest
 *
 * @author  Yannick Voyer (http://github.com/yvoyer)
 *
 * @package tests
 */
class PriceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var ProductCollection
     */
    private $collection;

    public function setUp()
    {
        $this->collection = new ProductCollection();
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->collection->addProduct(new Product());
        $this->customer = new Customer();
    }

    /**
     * @param $expectedPrice
     * @param PriceStrategy $strategy
     *
     * @dataProvider provideData
     */
    public function testShouldHaveNormalPricing($expectedPrice, PriceStrategy $strategy)
    {
        $this->assertCount(7, $this->collection->toArray());
        $this->assertSame(20.00, $this->customer->getCash());
        $strategy->buy($this->customer, $this->collection);
        $this->assertSame($expectedPrice, $this->customer->getCash());
    }

    public static function provideData()
    {
        $scenario1 = new NormalPriceStrategy();
        $scenario2 = new SecondWithPercentRebateStrategy(50);
        $scenario3 = new CompositeStrategy(array(
            new QuantityForPriceStrategy(5, 3.00),
            new NormalPriceStrategy(),
        ));
        $scenario4 = new CompositeStrategy(array(
            new QuantityForPriceStrategy(3, 2.00),
            new PercentRebateStrategy(50),
        ));
        $scenario5 = new PricePerKilogramStrategy(.25);
        $scenario6 = new CompositeStrategy(array(
            new QuantityForPriceOfOneStrategy(4),
            new NormalPriceStrategy(),
        ));

        return array(
            array(13.00, $scenario1),
            array(14.50, $scenario2),
            array(15.00, $scenario3),
            array(15.50, $scenario4),
            array(16.50, $scenario5),
            array(16.00, $scenario6),
        );
    }
}
 