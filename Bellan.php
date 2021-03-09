<?php require_once __DIR__ . '/vendor/autoload.php';

use GO\Scheduler;
use Symfony\Component\Yaml\Yaml;
use viktigpetterr\bellan\Lunchtime;

$workingHours = Yaml::parse(file_get_contents(__DIR__ . '/working-hours.yaml'));
$days = $workingHours['DAYS'];
$postAt = $workingHours['POST_AT'];
$timeZone = $workingHours['TIME_ZONE'];
date_default_timezone_set($timeZone);
[$hour, $minute] = explode(':', $postAt);
$scheduler = new Scheduler();
$scheduler
    ->call(function () {
        $config = Yaml::parse(file_get_contents(__DIR__ . '/bellan.yaml'));
        return (new Lunchtime($config['WEB_HOOK'], $config['RESTAURANTS']))->execute();
    })
    ->output(__DIR__ . '/bellan.log')
    ->at("$minute $hour * * $days");

$scheduler->run();




