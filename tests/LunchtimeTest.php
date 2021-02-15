<?php


use viktigpetterr\lunchtime\Lunchtime;
use PHPUnit\Framework\TestCase;
use viktigpetterr\lunchtime\restaurants\Spill;
use viktigpetterr\lunchtime\restaurants\Valfarden;

/**
 * Class LunchtimeTest
 */
class LunchtimeTest extends TestCase
{

    public function testExecute()
    {
        $webhook = 'test';
        $restaurants =
            [
                new Valfarden(),
                new Spill(),
            ];
        $lunchtime = new Lunchtime($webhook, $restaurants);
        $message = $lunchtime->execute();
        $this->assertStringContainsString($restaurants[0], $message);
        $this->assertStringContainsString($restaurants[1], $message);
    }
}
