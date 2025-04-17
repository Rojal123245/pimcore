<?php

// This is a standalone script to fix all Pimcore issues
// Access this file directly in your browser: http://your-domain.com/fix_all.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Pimcore Comprehensive Fix Script</h1>";

try {
    echo "<h2>Step 1: Fixing Routing Configuration</h2>";
    
    // Check if the admin-ui-classic-bundle routing file exists
    $adminUiClassicRoutingPath = '../vendor/pimcore/admin-ui-classic-bundle/config/pimcore/routing.yaml';
    if (!file_exists($adminUiClassicRoutingPath)) {
        echo "<p>Error: Admin UI Classic routing file not found at: $adminUiClassicRoutingPath</p>";
    } else {
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
    }
    
    echo "<h2>Step 2: Updating Bundles Configuration</h2>";
    
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
    
    echo "<h2>Step 3: Fixing Security Configuration</h2>";
    
    // Path to the security.yaml file
    $securityConfigPath = '../config/packages/security.yaml';
    
    // Check if the file exists
    if (!file_exists($securityConfigPath)) {
        echo "<p>Error: Security configuration file not found at: $securityConfigPath</p>";
    } else {
        echo "<p>Found security configuration file.</p>";
        
        // Read the file content
        $content = file_get_contents($securityConfigPath);
        
        // Create a backup of the original file
        $backupPath = $securityConfigPath . '.bak';
        if (!file_exists($backupPath)) {
            file_put_contents($backupPath, $content);
            echo "<p>Created backup of security configuration at: $backupPath</p>";
        }
        
        // Modify the access control section to allow public access to admin area
        $pattern = '/- \{ path: \^\/admin, roles: ROLE_PIMCORE_USER \}/';
        $replacement = '# Temporarily allow public access to admin area
    - { path: ^/admin, roles: PUBLIC_ACCESS }';
        
        $patchedContent = preg_replace($pattern, $replacement, $content);
        
        // Check if the replacement was successful
        if ($patchedContent === $content) {
            echo "<p>Warning: Failed to patch the access control section. The pattern might be different.</p>";
            
            // Try a more general approach
            $pattern = '/access_control:.*?- \{ path: \^\/admin.*?roles: .*?\}/s';
            if (preg_match($pattern, $content, $matches)) {
                $originalSection = $matches[0];
                $patchedSection = str_replace('roles: ROLE_PIMCORE_USER', 'roles: PUBLIC_ACCESS # Temporarily allow public access', $originalSection);
                
                $patchedContent = str_replace($originalSection, $patchedSection, $content);
                
                if ($patchedContent === $content) {
                    echo "<p>Warning: Failed to patch the access control section even with a more general approach.</p>";
                } else {
                    echo "<p>Successfully patched the access control section using a more general approach.</p>";
                    file_put_contents($securityConfigPath, $patchedContent);
                }
            } else {
                echo "<p>Warning: Could not find the access control section with regex.</p>";
            }
        } else {
            echo "<p>Successfully patched the access control section.</p>";
            file_put_contents($securityConfigPath, $patchedContent);
        }
    }
    
    echo "<h2>Step 4: Patching IndexController</h2>";
    
    // Path to the IndexController file
    $indexControllerPath = '../vendor/pimcore/admin-ui-classic-bundle/src/Controller/Admin/IndexController.php';
    
    // Check if the file exists
    if (!file_exists($indexControllerPath)) {
        echo "<p>Error: IndexController file not found at: $indexControllerPath</p>";
    } else {
        echo "<p>Found IndexController file.</p>";
        
        // Read the file content
        $content = file_get_contents($indexControllerPath);
        
        // Check if the file contains the setAdminLanguage method
        if (strpos($content, 'setAdminLanguage') === false) {
            echo "<p>Warning: setAdminLanguage method not found in IndexController.</p>";
        } else {
            echo "<p>Found setAdminLanguage method.</p>";
            
            // Create a backup of the original file
            $backupPath = $indexControllerPath . '.bak';
            if (!file_exists($backupPath)) {
                file_put_contents($backupPath, $content);
                echo "<p>Created backup of IndexController at: $backupPath</p>";
            }
            
            // Try to find the method with a regex
            $pattern = '/protected\s+function\s+setAdminLanguage\s*\(\s*Request\s+\$request\s*,\s*User\s+\$user\s*\)\s*:\s*static\s*\{[^}]+\}/s';
            if (preg_match($pattern, $content, $matches)) {
                $originalMethod = $matches[0];
                $patchedMethod = str_replace('User $user', '?User $user', $originalMethod);
                $patchedMethod = str_replace('$request->setLocale($user->getLanguage());', 'if ($user) { $request->setLocale($user->getLanguage()); } else { $request->setLocale("en"); }', $patchedMethod);
                $patchedMethod = str_replace('$this->translator->setLocale($user->getLanguage());', 'if ($user) { $this->translator->setLocale($user->getLanguage()); } else { $this->translator->setLocale("en"); }', $patchedMethod);
                
                $patchedContent = str_replace($originalMethod, $patchedMethod, $content);
                
                if ($patchedContent === $content) {
                    echo "<p>Warning: Failed to patch the method with regex.</p>";
                } else {
                    echo "<p>Successfully patched the method using regex.</p>";
                    file_put_contents($indexControllerPath, $patchedContent);
                }
            } else {
                echo "<p>Warning: Could not find the setAdminLanguage method with regex.</p>";
            }
        }
    }
    
    echo "<h2>Step 5: Creating Admin User</h2>";
    
    try {
        // Initialize Pimcore
        \Pimcore\Bootstrap::startup();
        
        echo "<p>Pimcore Bootstrap initialized successfully.</p>";
        
        // Get database connection
        $db = \Pimcore\Db::get();
        echo "<p>Database connection established.</p>";
        
        // Check if users table exists
        $tableExists = false;
        try {
            $tableExists = $db->fetchOne("SHOW TABLES LIKE 'users'");
            echo "<p>Checked if users table exists: " . ($tableExists ? "Yes" : "No") . "</p>";
        } catch (Exception $e) {
            echo "<p>Error checking users table: " . $e->getMessage() . "</p>";
        }
        
        if (!$tableExists) {
            echo "<p>Creating users table...</p>";
            try {
                // Create the users table
                $db->query("
                    CREATE TABLE IF NOT EXISTS `users` (
                      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                      `parentId` int(11) unsigned DEFAULT NULL,
                      `name` varchar(50) DEFAULT NULL,
                      `admin` tinyint(1) unsigned DEFAULT '0',
                      `active` tinyint(1) unsigned DEFAULT '1',
                      `password` varchar(255) DEFAULT NULL,
                      `apiKey` varchar(255) DEFAULT NULL,
                      `language` varchar(10) DEFAULT 'en',
                      `email` varchar(255) DEFAULT NULL,
                      `roles` varchar(1000) DEFAULT NULL,
                      `userRole` enum('ROLE_PIMCORE_ADMIN','ROLE_PIMCORE_USER') DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `name` (`name`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                ");
                echo "<p>Users table created successfully.</p>";
            } catch (Exception $e) {
                echo "<p>Error creating users table: " . $e->getMessage() . "</p>";
            }
        }
        
        // Check if admin user exists
        $adminExists = false;
        try {
            $adminExists = $db->fetchOne("SELECT id FROM users WHERE name = 'admin'");
            echo "<p>Checked if admin user exists: " . ($adminExists ? "Yes" : "No") . "</p>";
        } catch (Exception $e) {
            echo "<p>Error checking admin user: " . $e->getMessage() . "</p>";
        }
        
        if (!$adminExists) {
            echo "<p>Creating admin user...</p>";
            try {
                // Create admin user
                $db->insert('users', [
                    'parentId' => 0,
                    'name' => 'admin',
                    'admin' => 1,
                    'active' => 1,
                    'password' => password_hash('admin', PASSWORD_DEFAULT),
                    'language' => 'en',
                    'email' => 'admin@example.com',
                    'userRole' => 'ROLE_PIMCORE_ADMIN'
                ]);
                echo "<p>Admin user created successfully!</p>";
                echo "<p>Username: admin</p>";
                echo "<p>Password: admin</p>";
            } catch (Exception $e) {
                echo "<p>Error creating admin user: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>Admin user already exists.</p>";
        }
    } catch (Exception $e) {
        echo "<p>Error in Step 5: " . $e->getMessage() . "</p>";
    }
    
    echo "<h2>Step 6: Clearing Cache</h2>";
    
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
    
    echo "<h2>All Steps Completed</h2>";
    echo "<p>You can now try to <a href='/admin'>access the admin area</a>.</p>";
    
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

// Delete this file after use for security
echo "<p>For security reasons, please delete this file after use.</p>";
