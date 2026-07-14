<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$dbPath = '/tmp/portfolio.sqlite';
$bundledDb = __DIR__.'/../database/portfolio.sqlite';

if (!file_exists($dbPath) && file_exists($bundledDb)) {
    copy($bundledDb, $dbPath);
}

$dirs = [
    '/tmp/storage',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

define('LARAVEL_MAINTENANCE_DRIVER', 'file');

if (empty($_ENV['APP_URL']) && empty($_SERVER['APP_URL'])) {
    $_ENV['APP_URL'] = 'https://web-portfolio-delta-kohl.vercel.app';
    $_SERVER['APP_URL'] = 'https://web-portfolio-delta-kohl.vercel.app';
}
$_ENV['ASSET_URL'] = 'https://web-portfolio-delta-kohl.vercel.app';

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
