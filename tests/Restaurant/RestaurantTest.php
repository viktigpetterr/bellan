<?php

namespace viktigpetterr\Bellan\Tests\Restaurant;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use viktigpetterr\Bellan\Restaurant\Restaurant;

/**
 * Abstract Class RestaurantTest
 * @package Bellan\Tests\Restaurant
 */
abstract class RestaurantTest extends TestCase
{
    private const OK = 200;
    protected Restaurant $restaurant;

    protected Client $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client();
    }

    abstract public function testParse(): void;

    abstract public function testToString(): void;

    public function testURL(): void
    {
        $statusCode = $this->client->get($this->restaurant->getURL())->getStatusCode();
        $this->assertEquals(self::OK, $statusCode);
    }
}
