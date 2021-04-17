<?php


namespace viktigpetterr\Bellan\Tests;

use viktigpetterr\Bellan\Lunchtime;
use PHPUnit\Framework\TestCase;
use viktigpetterr\Bellan\Restaurant\Spill;
use viktigpetterr\Bellan\Restaurant\Valfarden;

/**
 * Class LunchtimeTest
 */
class LunchtimeTest extends TestCase
{
    private const WEB_HOOK = 'test';
    private const CURL_ERROR = 'Could not resolve host: ' . self::WEB_HOOK;
    private const BLACKLIST = ['<', '>'];

    public function testExecute()
    {
        $restaurants =
            [
                'Valfarden',
                'Spill',
            ];
        $lunchtime = new Lunchtime(self::WEB_HOOK, $restaurants);
        $message = $lunchtime->execute();
        $this->assertStringContainsString(new Valfarden(), $message);
        $this->assertStringContainsString(new Spill(), $message);
        $this->assertStringContainsString(self::CURL_ERROR, $message);
        foreach (self::BLACKLIST as $symbol)
        {
            $this->assertStringNotContainsString($symbol, $message);
        }
    }
}
