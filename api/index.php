<?php

// 1. Setup /tmp paths for Laravel's read-only environment
$tmpDir = '/tmp/laravel-real-estate';
$paths = [
    $tmpDir . '/bootstrap/cache',
    $tmpDir . '/storage/framework/sessions',
    $tmpDir . '/storage/framework/views',
    $tmpDir . '/storage/framework/cache',
];

foreach ($paths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

// 2. Force Laravel to use these paths for its internal manifests
// This overrides the "bootstrap/cache" directory issue
putenv("APP_SERVICES_CACHE={$tmpDir}/bootstrap/cache/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/bootstrap/cache/packages.php");
putenv("APP_CONFIG_CACHE={$tmpDir}/bootstrap/cache/config.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/bootstrap/cache/routes.php");

// 3. Launch the app
require __DIR__ . '/../public/index.php';