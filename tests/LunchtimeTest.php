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
                'Valfarden',
                'Spill',
            ];
        $lunchtime = new Lunchtime($webhook, $restaurants);
        $message = $lunchtime->execute();
        $this->assertStringContainsString(new Valfarden(), $message);
        $this->assertStringContainsString(new Spill(), $message);
    }
}
