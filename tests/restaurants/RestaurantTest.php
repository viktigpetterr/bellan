<?php


namespace restaurants;

use PHPUnit\Framework\TestCase;
use viktigpetterr\lunchtime\restaurants\Restaurant;

/**
 * Abstract Class RestaurantTest
 * @package restaurants
 */
abstract class RestaurantTest extends TestCase
{
    protected Restaurant $restaurant;

    public abstract function testParse(): void;

    public abstract function testToString(): void;
}