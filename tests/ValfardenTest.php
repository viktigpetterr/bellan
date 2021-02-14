<?php

use lunchtime\restaurants\Valfarden;

class ValfardenTest extends RestaurantTest
{
    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Valfarden();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse();
        $this->assertNotEmpty($menus);
    }

    public function testToString(): void
    {
        $this->assertEquals('Välfärden', $this->restaurant);
    }
}