<?php

// This is a standalone script to patch the IndexController
// Access this file directly in your browser: http://your-domain.com/patch_index_controller.php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Pimcore IndexController Patcher</h1>";

try {
    // Path to the IndexController file
    $indexControllerPath = '../vendor/pimcore/admin-ui-classic-bundle/src/Controller/Admin/IndexController.php';
    
    // Check if the file exists
    if (!file_exists($indexControllerPath)) {
        echo "<p>Error: IndexController file not found at: $indexControllerPath</p>";
        exit;
    }
    
    echo "<p>Found IndexController file.</p>";
    
    // Read the file content
    $content = file_get_contents($indexControllerPath);
    
    // Check if the file contains the setAdminLanguage method
    if (strpos($content, 'setAdminLanguage') === false) {
        echo "<p>Error: setAdminLanguage method not found in IndexController.</p>";
        exit;
    }
    
    echo "<p>Found setAdminLanguage method.</p>";
    
    // Create a backup of the original file
    $backupPath = $indexControllerPath . '.bak';
    if (!file_exists($backupPath)) {
        file_put_contents($backupPath, $content);
        echo "<p>Created backup of IndexController at: $backupPath</p>";
    }
    
    // Patch the setAdminLanguage method to handle null users
    $originalMethod = 'protected function setAdminLanguage(Request $request, User $user): static
    {
        // set user language
        $request->setLocale($user->getLanguage());
        if ($this->translator instanceof LocaleAwareInterface) {
            $this->translator->setLocale($user->getLanguage());
        }

        return $this;
    }';
    
    $patchedMethod = 'protected function setAdminLanguage(Request $request, ?User $user): static
    {
        // set user language
        if ($user) {
            $request->setLocale($user->getLanguage());
            if ($this->translator instanceof LocaleAwareInterface) {
                $this->translator->setLocale($user->getLanguage());
            }
        } else {
            // Default to English if no user is provided
            $request->setLocale("en");
            if ($this->translator instanceof LocaleAwareInterface) {
                $this->translator->setLocale("en");
            }
        }

        return $this;
    }';
    
    // Replace the method in the content
    $patchedContent = str_replace($originalMethod, $patchedMethod, $content);
    
    // Check if the replacement was successful
    if ($patchedContent === $content) {
        echo "<p>Error: Failed to patch the setAdminLanguage method. The method signature might be different.</p>";
        
        // Try to find the method with a regex
        $pattern = '/protected\s+function\s+setAdminLanguage\s*\(\s*Request\s+\$request\s*,\s*User\s+\$user\s*\)\s*:\s*static\s*\{[^}]+\}/s';
        if (preg_match($pattern, $content, $matches)) {
            $originalMethod = $matches[0];
            $patchedMethod = str_replace('User $user', '?User $user', $originalMethod);
            $patchedMethod = str_replace('$request->setLocale($user->getLanguage());', 'if ($user) { $request->setLocale($user->getLanguage()); } else { $request->setLocale("en"); }', $patchedMethod);
            $patchedMethod = str_replace('$this->translator->setLocale($user->getLanguage());', 'if ($user) { $this->translator->setLocale($user->getLanguage()); } else { $this->translator->setLocale("en"); }', $patchedMethod);
            
            $patchedContent = str_replace($originalMethod, $patchedMethod, $content);
            
            if ($patchedContent === $content) {
                echo "<p>Error: Failed to patch the method even with regex.</p>";
                exit;
            } else {
                echo "<p>Successfully patched the method using regex.</p>";
            }
        } else {
            echo "<p>Error: Could not find the setAdminLanguage method with regex.</p>";
            exit;
        }
    } else {
        echo "<p>Successfully patched the setAdminLanguage method.</p>";
    }
    
    // Write the patched content back to the file
    file_put_contents($indexControllerPath, $patchedContent);
    echo "<p>Successfully updated the IndexController file.</p>";
    
    echo "<p>You can now try to <a href='/admin'>access the admin area</a>.</p>";
    
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

// Delete this file after use for security
echo "<p>For security reasons, please delete this file after use.</p>";
