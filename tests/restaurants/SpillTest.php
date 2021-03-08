<?php

namespace restaurants;


use viktigpetterr\bellan\restaurants\Spill;

/**
 * Class SpillTest
 */
class SpillTest extends RestaurantTest
{

    const HTML_FILE = __DIR__ . '/static/spill.html';

    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Spill();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse(file_get_contents(self::HTML_FILE));
        $this->assertCount(2, $menus);
        $this->assertEquals("Färsbiffar med mangold, pepparsås & potatispuré", $menus[0]);
        $this->assertEquals("Vegetariskt: Kikärtsbiffar med samma tillbehör", $menus[1]);
    }

    public function testToString(): void
    {
        $this->assertEquals('SPILL', $this->restaurant);
    }
}
