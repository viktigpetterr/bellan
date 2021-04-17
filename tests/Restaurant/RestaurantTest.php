<?php


namespace viktigpetterr\Bellan\Tests\Restaurant;

use PHPUnit\Framework\TestCase;
use viktigpetterr\Bellan\Restaurant\Restaurant;

/**
 * Abstract Class RestaurantTest
 * @package Bellan\Tests\Restaurant
 */
abstract class RestaurantTest extends TestCase
{
    protected Restaurant $restaurant;

    public abstract function testParse(): void;

    public abstract function testToString(): void;
}
