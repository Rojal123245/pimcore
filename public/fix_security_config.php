<?php

// This is a standalone script to fix the security configuration
// Access this file directly in your browser: http://your-domain.com/fix_security_config.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Pimcore Security Configuration Fixer</h1>";

try {
    // Path to the security.yaml file
    $securityConfigPath = '../config/packages/security.yaml';
    
    // Check if the file exists
    if (!file_exists($securityConfigPath)) {
        echo "<p>Error: Security configuration file not found at: $securityConfigPath</p>";
        exit;
    }
    
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
        echo "<p>Error: Failed to patch the access control section. The pattern might be different.</p>";
        
        // Try a more general approach
        $pattern = '/access_control:.*?- \{ path: \^\/admin.*?roles: .*?\}/s';
        if (preg_match($pattern, $content, $matches)) {
            $originalSection = $matches[0];
            $patchedSection = str_replace('roles: ROLE_PIMCORE_USER', 'roles: PUBLIC_ACCESS # Temporarily allow public access', $originalSection);
            
            $patchedContent = str_replace($originalSection, $patchedSection, $content);
            
            if ($patchedContent === $content) {
                echo "<p>Error: Failed to patch the access control section even with a more general approach.</p>";
                exit;
            } else {
                echo "<p>Successfully patched the access control section using a more general approach.</p>";
            }
        } else {
            echo "<p>Error: Could not find the access control section with regex.</p>";
            exit;
        }
    } else {
        echo "<p>Successfully patched the access control section.</p>";
    }
    
    // Write the patched content back to the file
    file_put_contents($securityConfigPath, $patchedContent);
    echo "<p>Successfully updated the security configuration file.</p>";
    
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
