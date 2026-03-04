<?php
// router.php - Handle clean URL routing and static files
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Remove trailing slashes
$uri = rtrim($uri, '/');

// Serve static files directly (CSS, JS, images, fonts)
$static_extensions = ['.css', '.js', '.jpg', '.jpeg', '.png', '.gif', '.svg', '.woff', '.woff2', '.ttf', '.eot'];
$file_extension = strtolower(strrchr($uri, '.'));

if (in_array($file_extension, $static_extensions)) {
    $file_path = __DIR__ . $uri;
    if (file_exists($file_path) && is_file($file_path)) {
        // Set appropriate content type
        $mime_types = [
            '.css' => 'text/css',
            '.js' => 'application/javascript',
            '.json' => 'application/json',
            '.jpg' => 'image/jpeg',
            '.jpeg' => 'image/jpeg',
            '.png' => 'image/png',
            '.gif' => 'image/gif',
            '.svg' => 'image/svg+xml',
            '.woff' => 'font/woff',
            '.woff2' => 'font/woff2',
            '.ttf' => 'font/ttf',
            '.eot' => 'application/vnd.ms-fontobject'
        ];
        
        header('Content-Type: ' . ($mime_types[$file_extension] ?? 'application/octet-stream'));
        readfile($file_path);
        return;
    }
}

// Default to index.php
if ($uri === '' || $uri === '/') {
    require __DIR__ . '/index.php';
    return;
}

// Map clean URLs to PHP files
$routes = [
    '/about' => 'about.php',
    '/contact' => 'contact.php',
    '/units' => 'units.php',
];

if (array_key_exists($uri, $routes)) {
    require __DIR__ . '/' . $routes[$uri];
} elseif (preg_match('#^/units/([a-z0-9\-]+)$#', $uri, $matches)) {
    // Individual unit detail page: /units/{slug}
    $unitSlug = $matches[1];
    require __DIR__ . '/unit-detail.php';
} else {
    // 404 Page Not Found
    http_response_code(404);
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>404 - Page Not Found</title>
    <link rel='stylesheet' href='/css/style.css'>
    <style>
        .error-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .error-content {
            text-align: center;
            color: white;
        }
        .error-content h1 {
            font-size: 4rem;
            margin: 0;
        }
        .error-content p {
            font-size: 1.3rem;
            margin: 1rem 0;
        }
        .error-content a {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.8rem 2rem;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: transform 0.3s ease;
        }
        .error-content a:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class='error-container'>
        <div class='error-content'>
            <h1>404</h1>
            <p>Page Not Found</p>
            <p>Sorry, the page you're looking for doesn't exist.</p>
            <a href='/'>← Back to Home</a>
        </div>
    </div>
</body>
</html>";
}
