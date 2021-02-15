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
        $webhook = 'https://hooks.slack.com/services/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';
        $restaurants =
            [
                new Valfarden(),
            ];
        $lunchtime = new Lunchtime($webhook, $restaurants);
        $lunchtime->execute();
    }
}
