<?php require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use viktigpetterr\bellan\Lunchtime;

$config = Yaml::parse(file_get_contents('config.example.yaml'));
$webhook = $config['WEB_HOOK'];
$postAt = $config['POST_AT'];
$restaurants = $config['RESTAURANTS'];

foreach ($restaurants as $key => $restaurant)
{
    $namespace = "viktigpetterr\\bellan\\restaurants\\$restaurant";
    $restaurants[$key] = new $namespace;
}
$message = (new Lunchtime($webhook, $restaurants))->execute();
printf($message . "\n");


