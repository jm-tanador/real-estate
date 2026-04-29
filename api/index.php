<?php

// 1. Create required folders in /tmp (Vercel is read-only, only /tmp works)
$runtimePaths = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/bootstrap/cache',
];

foreach ($runtimePaths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// 2. Bridge to the real Laravel index
require __DIR__ . '/../public/index.php';