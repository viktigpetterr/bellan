<?php

namespace restaurants;


use viktigpetterr\lunchtime\restaurants\Spill;

/**
 * Class SpillTest
 */
class SpillTest extends RestaurantTest
{

    const HTML_FILE = '/static/spill.html';

    public function setUp(): void
    {
        parent::setUp();
        $this->restaurant = new Spill();
    }

    public function testParse(): void
    {
        $menus = $this->restaurant->parse();
        $this->assertCount(2, $menus);
        $this->assertEquals("Köttbullar, lingon, gurka, gräddsås", $menus[0]);
        $this->assertEquals("Vegetariskt; Kikärtsbullar med samma tillbehör", $menus[1]);
    }

    public function testToString(): void
    {
        $this->assertEquals('SPILL', $this->restaurant);
    }
}
