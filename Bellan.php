<?php require_once __DIR__ . '/vendor/autoload.php';

use GO\Scheduler;
use Symfony\Component\Yaml\Yaml;
use viktigpetterr\Bellan\Lunchtime;

$config = Yaml::parse(file_get_contents(__DIR__ . '/bellan.yaml'));
$days = $config['DAYS'];
$postAt = $config['POST_AT'];
$timeZone = $config['TIME_ZONE'];
date_default_timezone_set($timeZone);
[$hour, $minute] = explode(':', $postAt);
$scheduler = new Scheduler();
$scheduler
    ->call(function () use ($config) {
        return (new Lunchtime($config['WEB_HOOK'], $config['RESTAURANTS']))->execute();
    })
    ->output(__DIR__ . '/bellan.log')
    ->at("$minute $hour * * $days");

$scheduler->run();




