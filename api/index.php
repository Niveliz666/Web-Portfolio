<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

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
$_ENV['APP_KEY'] = $_ENV['APP_KEY'] ?? 'base64:lPPEX7l8hkhpySAUl0A6arzzlB07JO8zng9uFN658Sw=';
$_ENV['APP_DEBUG'] = 'false';
$_ENV['APP_ENV'] = 'production';
$_ENV['ASSET_URL'] = 'https://web-portfolio-delta-kohl.vercel.app';

$_ENV['DB_CONNECTION'] = 'mysql';
$_ENV['DB_HOST'] = 'epzki4.h.filess.io';
$_ENV['DB_PORT'] = '3306';
$_ENV['DB_DATABASE'] = 'web_portfolio_tallchose';
$_ENV['DB_USERNAME'] = 'web_portfolio_tallchose';
$_ENV['DB_PASSWORD'] = '834a5b6fe7edc8823a513cd123484f66cfeaff5f';

$_ENV['SESSION_DRIVER'] = 'database';
$_ENV['SESSION_LIFETIME'] = '120';
$_ENV['SESSION_SECURE_COOKIE'] = 'true';
$_ENV['SESSION_SAME_SITE'] = 'lax';

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
