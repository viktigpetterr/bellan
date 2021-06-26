<?php

namespace viktigpetterr\Bellan\Tests\Restaurant;

use viktigpetterr\Bellan\Restaurant\Spill;

/**
 * Class SpillTest
 * @package Bellan\Tests\Restaurant
 */
class SpillTest extends RestaurantTest
{

    private const HTML_FILE = __DIR__ . '/static/spill.html';

    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Spill();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse(file_get_contents(self::HTML_FILE));
        $this->assertCount(2, $menus);
        $this->assertEquals("Kycklinglårfilé med curry, äpple, paprika och persilja", $menus[0]);
        $this->assertEquals("Vegetariskt: Aubergine i curry, äpple, paprika och persilja", $menus[1]);
    }

    public function testToString(): void
    {
        $this->assertEquals('SPILL', $this->restaurant);
    }
}
