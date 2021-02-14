<?php

namespace lunchtime;

use lunchtime\restaurants\Valfarden;

$restaurants =
    [
        new Valfarden(),
    ];
(new Lunchtime('token', $restaurants))->execute();
