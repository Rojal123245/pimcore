<?php

// This is a standalone script to create an admin user in the Pimcore database
// Access this file directly in your browser: http://your-domain.com/create_admin_user.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the autoloader
require_once '../vendor/autoload.php';

echo "<h1>Pimcore Admin User Creator</h1>";

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
    
    echo "<p>You can now try to <a href='/admin'>login to the admin area</a>.</p>";
    
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

// Delete this file after use for security
echo "<p>For security reasons, please delete this file after use.</p>";
