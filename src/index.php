<?php


namespace viktigpetterr\lunchtime;

use viktigpetterr\lunchtime\restaurants\Valfarden;

require __DIR__ . '/../vendor/autoload.php';

$restaurants =
    [
        new Valfarden(),
    ];
(new Lunchtime('token', $restaurants))->execute();
