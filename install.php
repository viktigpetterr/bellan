<?php

require_once  __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

if (!file_exists(__DIR__ . '/bellan.yaml')) {
    printf("Initializing bellan.yaml\n");
    copy(__DIR__ . '/bellan.example.yaml', __DIR__ . '/bellan.yaml');
    $yaml = Yaml::parseFile(__DIR__ . '/bellan.yaml');
    $yaml['WEB_HOOK'] = readline('Enter Slack webhook: ');
    $yaml['TIME_ZONE'] = readline('Enter timezone (default: Europe/Stockholm): ') ?: 'Europe/Stockholm';
    $yaml['DAYS'] = readline('Enter days (default: 1-5): ') ?: '1-5';
    $yaml['POST_AT'] = readline('Enter time to post at (default: 11:00): ') ?: '11:00';
    file_put_contents(__DIR__ . '/bellan.yaml', Yaml::dump($yaml));
}

$path = __DIR__ . '/Bellan.php';
exec('crontab -l', $cronJobs);
if (!str_contains(join($cronJobs), $path)) {
    printf("Initializing cron job\n");
    $job = "* * * * * /usr/bin/php $path 1>> /dev/null 2>&1";
    $command = '(crontab -l ; echo "' . $job . '") 2>&1 | grep -v "no crontab" | sort | uniq | crontab -';
    exec($command);
}
