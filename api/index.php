<?php
// Ensure the request URI is passed correctly to Laravel
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$_SERVER['SCRIPT_NAME'] = '/api/index.php';

require __DIR__ . '/../public/index.php';