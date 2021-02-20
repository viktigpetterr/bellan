<?php require_once __DIR__ . '/vendor/autoload.php';

use GO\Scheduler;
use Symfony\Component\Yaml\Yaml;
use viktigpetterr\bellan\Lunchtime;

$workingHours = Yaml::parse(file_get_contents('working-hours.example.yaml'));
$days = $workingHours['DAYS'];
$postAt = $workingHours['POST_AT'];
[$hour, $minute] = explode(':', $postAt);

(new Scheduler())
    ->call(function () {
        $config = Yaml::parse(file_get_contents('bellan.example.yaml'));
        $webhook = $config['WEB_HOOK'];
        $restaurants = $config['RESTAURANTS'];
        (new Lunchtime($webhook, $restaurants))->execute();
    })
    ->at("$minute $hour * * $days")
    ->run();




