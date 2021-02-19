<?php


use viktigpetterr\bellan\Lunchtime;
use PHPUnit\Framework\TestCase;
use viktigpetterr\bellan\restaurants\Spill;
use viktigpetterr\bellan\restaurants\Valfarden;

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
