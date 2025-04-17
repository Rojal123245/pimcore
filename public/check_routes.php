<?php

// This is a standalone script to check if the routes are working
// Access this file directly in your browser: http://your-domain.com/check_routes.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Pimcore Route Checker</h1>";

try {
    // Include the autoloader
    require_once '../vendor/autoload.php';
    
    echo "<p>Autoloader loaded successfully.</p>";
    
    // Initialize Pimcore
    \Pimcore\Bootstrap::startup();
    
    echo "<p>Pimcore Bootstrap initialized successfully.</p>";
    
    // Get the router
    $kernel = \Pimcore\Bootstrap::kernel();
    $router = $kernel->getContainer()->get('router');
    
    echo "<p>Router service loaded successfully.</p>";
    
    // Check if the admin routes exist
    $adminRoutes = [];
    $allRoutes = $router->getRouteCollection();
    
    foreach ($allRoutes as $name => $route) {
        if (strpos($name, 'pimcore_admin') === 0 || strpos($route->getPath(), '/admin') === 0) {
            $adminRoutes[$name] = $route->getPath();
        }
    }
    
    echo "<h2>Admin Routes</h2>";
    
    if (empty($adminRoutes)) {
        echo "<p>No admin routes found!</p>";
    } else {
        echo "<ul>";
        foreach ($adminRoutes as $name => $path) {
            echo "<li><strong>$name</strong>: $path</li>";
        }
        echo "</ul>";
    }
    
    // Check if the admin controllers exist
    echo "<h2>Admin Controllers</h2>";
    
    $adminControllerPath = '../vendor/pimcore/admin-ui-classic-bundle/src/Controller/Admin/IndexController.php';
    if (file_exists($adminControllerPath)) {
        echo "<p>Admin IndexController exists at: $adminControllerPath</p>";
        
        // Check if the indexAction method exists
        $content = file_get_contents($adminControllerPath);
        if (strpos($content, 'indexAction') !== false) {
            echo "<p>indexAction method found in IndexController.</p>";
        } else {
            echo "<p>indexAction method NOT found in IndexController!</p>";
        }
    } else {
        echo "<p>Admin IndexController NOT found at: $adminControllerPath</p>";
    }
    
    $adminLoginControllerPath = '../vendor/pimcore/admin-ui-classic-bundle/src/Controller/Admin/LoginController.php';
    if (file_exists($adminLoginControllerPath)) {
        echo "<p>Admin LoginController exists at: $adminLoginControllerPath</p>";
        
        // Check if the loginAction method exists
        $content = file_get_contents($adminLoginControllerPath);
        if (strpos($content, 'loginAction') !== false) {
            echo "<p>loginAction method found in LoginController.</p>";
        } else {
            echo "<p>loginAction method NOT found in LoginController!</p>";
        }
    } else {
        echo "<p>Admin LoginController NOT found at: $adminLoginControllerPath</p>";
    }
    
    echo "<h2>Recommendations</h2>";
    
    echo "<p>1. Make sure you have upgraded to PHP 8.2 as required by Pimcore 11.</p>";
    echo "<p>2. Try accessing the admin area at: <a href='/admin'>/admin</a></p>";
    echo "<p>3. Try accessing the admin login at: <a href='/admin/login'>/admin/login</a></p>";
    
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

// Delete this file after use for security
echo "<p>For security reasons, please delete this file after use.</p>";
