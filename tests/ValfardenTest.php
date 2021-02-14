<?php

use viktigpetterr\lunchtime\restaurants\Valfarden;

class ValfardenTest extends RestaurantTest
{
    private const HTML_FILE = '/static/valfarden.html';

    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Valfarden();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse(file_get_contents(__DIR__ . self::HTML_FILE));
        $this->assertCount(1, $menus);
        $this->assertEquals("test & test", $menus[0]);
    }

    public function testToString(): void
    {
        $this->assertEquals('Välfärden', $this->restaurant);
    }
}