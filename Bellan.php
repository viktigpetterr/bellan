<?php require_once __DIR__ . '/vendor/autoload.php';

use GO\Scheduler;
use Symfony\Component\Yaml\Yaml;
use viktigpetterr\bellan\Lunchtime;

$workingHours = Yaml::parse(file_get_contents(__DIR__ . '/working-hours.yaml'));
$days = $workingHours['DAYS'];
$postAt = $workingHours['POST_AT'];
[$hour, $minute] = explode(':', $postAt);

(new Scheduler())
    ->call(function () {
        $config = Yaml::parse(file_get_contents(__DIR__ . '/bellan.yaml'));
        return (new Lunchtime($config['WEB_HOOK'], $config['RESTAURANTS']))->execute();
    })
    ->at("$minute $hour * * $days")
    ->output(__DIR__ . '/bellan.log')
    ->run();




