<?php


use viktigpetterr\lunchtime\Lunchtime;
use PHPUnit\Framework\TestCase;
use viktigpetterr\lunchtime\restaurants\Valfarden;

/**
 * Class LunchtimeTest
 */
class LunchtimeTest extends TestCase
{

    public function testExecute()
    {
        $hookUrl = 'test';
        $restaurants =
            [
                new Valfarden(),
            ];
        $lunchtime = new Lunchtime($hookUrl, $restaurants);
        $lunchtime->execute();
    }
}
