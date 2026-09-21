<?php
// Mengubah direktori kerja ke folder utama (root) agar relative include seperti 'components/header.php' tetap berfungsi.
chdir(__DIR__ . '/..');

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($request_uri === '/' || $request_uri === '') {
    require 'index.php';
} else {
    // Hilangkan slash di awal untuk mencocokkan path file lokal
    $file = ltrim($request_uri, '/');
    
    if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        require $file;
    } else if (is_file($file . '.php')) {
        require $file . '.php';
    } else if (is_file($file . '/index.php')) {
        require $file . '/index.php';
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
}
