<?php

use lunchtime\restaurants\Restaurant;
use PHPUnit\Framework\TestCase;

abstract class RestaurantTest extends TestCase
{
    protected Restaurant $restaurant;

    public abstract function testParse(): void;

    public abstract function testToString(): void;
}