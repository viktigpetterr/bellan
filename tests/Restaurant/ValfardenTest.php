<?php


namespace viktigpetterr\Bellan\Tests\Restaurant;

use viktigpetterr\Bellan\Restaurant\Valfarden;

/**
 * Class ValfardenTest
 * @package Bellan\Tests\Restaurant
 */
class ValfardenTest extends RestaurantTest
{
    private const HTML_FILE = __DIR__ . '/static/valfarden.html';

    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Valfarden();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse(file_get_contents(self::HTML_FILE));
        $this->assertCount(1, $menus);
        $this->assertEquals("test & test", $menus[0]);
    }

    public function testToString(): void
    {
        $this->assertEquals('Välfärden', $this->restaurant);
    }
}
