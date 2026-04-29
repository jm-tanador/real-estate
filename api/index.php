<?php

// 1. Setup /tmp for Laravel's internal cache
$tmpDir = '/tmp/laravel';
foreach (['/bootstrap/cache', '/storage/framework/views'] as $dir) {
    if (!is_dir($tmpDir . $dir)) {
        mkdir($tmpDir . $dir, 0777, true);
    }
}

// 2. Map Laravel's environment variables to the /tmp folder
putenv("APP_CONFIG_CACHE={$tmpDir}/bootstrap/cache/config.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/bootstrap/cache/routes.php");
putenv("APP_SERVICES_CACHE={$tmpDir}/bootstrap/cache/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/bootstrap/cache/packages.php");
putenv("VIEW_COMPILED_PATH={$tmpDir}/storage/framework/views");

// 3. IMPORTANT: Tell Laravel to ignore the "/api" prefix from Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

require __DIR__ . '/../public/index.php';