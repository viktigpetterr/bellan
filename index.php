<?php


namespace viktigpetterr\lunchtime;

use viktigpetterr\lunchtime\restaurants\Valfarden;

require __DIR__ . '/vendor/autoload.php';

$hookUrl = '';
$restaurants =
    [
        new Valfarden(),
    ];
(new Lunchtime($hookUrl, $restaurants))->execute();
