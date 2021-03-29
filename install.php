<?php require_once  __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

if (!file_exists(__DIR__ . '/bellan.yaml'))
{
    copy(__DIR__ . '/bellan.example.yaml', __DIR__ . '/bellan.yaml');
    $yaml = Yaml::parseFile(__DIR__ . '/bellan.yaml');
    $webhook = readline('Enter Slack webhook: ');
    $yaml['WEB_HOOK'] = $webhook;
    file_put_contents(__DIR__ . '/bellan.yaml', Yaml::dump($yaml));
}
if (!file_exists(__DIR__ . '/working-hours.yaml'))
{
    copy(__DIR__ . '/working-hours.example.yaml', __DIR__ . '/working-hours.yaml');
    $yaml = Yaml::parseFile(__DIR__ . '/working-hours.yaml');
    $yaml['TIME_ZONE'] = readline('Enter timezone (default: Europe/Stockholm): ');
    $yaml['DAYS'] = readline('Enter days (default: 1-5): ');
    $yaml['POST_AT'] = readline('Enter time to post at (default: 11:00): ');
    file_put_contents(__DIR__ . '/working-hours.yaml', Yaml::dump($yaml));
}

