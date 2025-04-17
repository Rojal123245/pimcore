<?php

// This is a standalone script to fix the routing configuration
// Access this file directly in your browser: http://your-domain.com/fix_routing.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Pimcore Routing Configuration Fixer</h1>";

try {
    // Check if the admin-ui-classic-bundle routing file exists
    $adminUiClassicRoutingPath = '../vendor/pimcore/admin-ui-classic-bundle/config/pimcore/routing.yaml';
    if (!file_exists($adminUiClassicRoutingPath)) {
        echo "<p>Error: Admin UI Classic routing file not found at: $adminUiClassicRoutingPath</p>";
        exit;
    }
    
    echo "<p>Found Admin UI Classic routing file.</p>";
    
    // Create the routes directory if it doesn't exist
    if (!is_dir('../config/routes')) {
        mkdir('../config/routes', 0755, true);
        echo "<p>Created routes directory.</p>";
    }
    
    // Create the admin-ui-classic-bundle routing configuration
    $adminUiClassicRouteConfig = <<<EOT
_pimcore_admin_ui_classic:
    resource: "@PimcoreAdminUiClassicBundle/config/pimcore/routing.yaml"
    prefix: /
EOT;
    
    file_put_contents('../config/routes/pimcore_admin_ui_classic.yaml', $adminUiClassicRouteConfig);
    echo "<p>Created Admin UI Classic routing configuration.</p>";
    
    // Create the admin-bundle routing configuration
    $adminRouteConfig = <<<EOT
_pimcore_admin:
    resource: "@PimcoreAdminBundle/config/routing.yaml"
    prefix: /
EOT;
    
    file_put_contents('../config/routes/pimcore_admin.yaml', $adminRouteConfig);
    echo "<p>Created Admin routing configuration.</p>";
    
    // Update the bundles.php file to include the AdminUiClassicBundle
    $bundlesPath = '../config/bundles.php';
    if (file_exists($bundlesPath)) {
        $bundlesContent = file_get_contents($bundlesPath);
        
        // Check if the AdminUiClassicBundle is already included
        if (strpos($bundlesContent, 'PimcoreAdminUiClassicBundle') === false) {
            // Add the AdminUiClassicBundle after the AdminBundle
            $bundlesContent = str_replace(
                "Pimcore\\Bundle\\AdminBundle\\PimcoreAdminBundle::class => ['all' => true, 'priority' => 100],",
                "Pimcore\\Bundle\\AdminBundle\\PimcoreAdminBundle::class => ['all' => true, 'priority' => 100],\n    Pimcore\\Bundle\\AdminUiClassicBundle\\PimcoreAdminUiClassicBundle::class => ['all' => true, 'priority' => 90],",
                $bundlesContent
            );
            
            file_put_contents($bundlesPath, $bundlesContent);
            echo "<p>Updated bundles.php to include AdminUiClassicBundle.</p>";
        } else {
            echo "<p>AdminUiClassicBundle is already included in bundles.php.</p>";
        }
    } else {
        echo "<p>Error: bundles.php file not found at: $bundlesPath</p>";
    }
    
    // Clear the cache
    if (is_dir('../var/cache')) {
        $cacheDir = '../var/cache';
        $files = glob($cacheDir . '/*');
        foreach ($files as $file) {
            if (is_dir($file)) {
                // Recursively delete directory contents
                $dirFiles = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($file, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::CHILD_FIRST
                );
                foreach ($dirFiles as $dirFile) {
                    if ($dirFile->isDir()) {
                        rmdir($dirFile->getRealPath());
                    } else {
                        unlink($dirFile->getRealPath());
                    }
                }
                rmdir($file);
            } else {
                unlink($file);
            }
        }
        echo "<p>Successfully cleared the cache.</p>";
    } else {
        echo "<p>Cache directory not found.</p>";
    }
    
    echo "<p>You can now try to <a href='/admin'>access the admin area</a>.</p>";
    
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

// Delete this file after use for security
echo "<p>For security reasons, please delete this file after use.</p>";
