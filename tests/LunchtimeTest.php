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
    private const WEB_HOOK = 'test';
    private const CURL_ERROR = 'Could not resolve host: ' . self::WEB_HOOK;

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
    }
}
