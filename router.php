<?php
/**
 * Local development router for PHP built-in server
 * Supports extensionless clean URLs (.php / .html) and static assets matching .htaccess
 */
$root = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rawurldecode($uri);

// 301 Redirect map for legacy/alternative routes
$redirects = [
    '/equipment-sales' => '/sales-service',
    '/equipment-rental' => '/rental-service',
    '/service-amc' => '/klean-max-service',
    '/machine-repair' => '/klean-max-service',
    '/office-cleaning-services' => '/office-cleaning',
    '/office-cleaning-services/' => '/office-cleaning',
];

$trimmedCheck = rtrim($uri, '/');
if (isset($redirects[$trimmedCheck])) {
    header("Location: " . $redirects[$trimmedCheck], true, 301);
    exit;
}

$filePath = $root . $uri;

// 1. Direct file match (css, js, images, existing php/html files, etc.)
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    if ($ext === 'php') {
        $_SERVER['SCRIPT_NAME'] = $uri;
        $_SERVER['PHP_SELF'] = $uri;
        require $filePath;
        return true;
    }
    return false; // let built-in server handle mime types and streaming
}

// 2. Directory match -> look for index.php or index.html
if (is_dir($filePath)) {
    $dirIndexPhp = rtrim($filePath, '/\\') . DIRECTORY_SEPARATOR . 'index.php';
    $dirIndexHtml = rtrim($filePath, '/\\') . DIRECTORY_SEPARATOR . 'index.html';
    if (file_exists($dirIndexPhp)) {
        $_SERVER['SCRIPT_NAME'] = rtrim($uri, '/') . '/index.php';
        $_SERVER['PHP_SELF'] = rtrim($uri, '/') . '/index.php';
        require $dirIndexPhp;
        return true;
    }
    if (file_exists($dirIndexHtml)) {
        return false;
    }
}

// 3. Extensionless .php lookup (e.g., /about -> /about.php, /contact -> /contact.php)
$trimmedUri = rtrim($uri, '/');
if (file_exists($root . $trimmedUri . '.php')) {
    $_SERVER['SCRIPT_NAME'] = $trimmedUri . '.php';
    $_SERVER['PHP_SELF'] = $trimmedUri . '.php';
    require $root . $trimmedUri . '.php';
    return true;
}

// 4. Extensionless .html lookup (e.g., /office-cleaning -> /office-cleaning.html)
if (file_exists($root . $trimmedUri . '.html')) {
    $_SERVER['SCRIPT_NAME'] = $trimmedUri . '.html';
    $_SERVER['PHP_SELF'] = $trimmedUri . '.html';
    header('Content-Type: text/html; charset=UTF-8');
    readfile($root . $trimmedUri . '.html');
    return true;
}

// 5. Fallback 404
http_response_code(404);
echo "<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>404 Not Found</h1><p>The requested URL " . htmlspecialchars($uri) . " was not found on this server.</p><a href='/'>Go to Home</a></body></html>";
return true;
