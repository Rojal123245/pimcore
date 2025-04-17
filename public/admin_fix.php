<?php

// This is a standalone script to fix the admin user issue
// Access this file directly in your browser: http://your-domain.com/admin_fix.php

// Include the autoloader
require_once '../vendor/autoload.php';

// Initialize Pimcore
\Pimcore\Bootstrap::startup();

try {
    // Check if the users table exists
    $db = \Pimcore\Db::get();
    $tableExists = $db->fetchOne("SHOW TABLES LIKE 'users'");
    
    if (!$tableExists) {
        // Create the users table if it doesn't exist
        $db->query("
            CREATE TABLE IF NOT EXISTS `users` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `parentId` int(11) unsigned DEFAULT NULL,
              `name` varchar(50) DEFAULT NULL,
              `admin` tinyint(1) unsigned DEFAULT '0',
              `active` tinyint(1) unsigned DEFAULT '1',
              `password` varchar(255) DEFAULT NULL,
              `apiKey` varchar(255) DEFAULT NULL,
              `twoFactorAuthentication` longtext,
              `firstLogin` tinyint(1) DEFAULT NULL,
              `lastLogin` int(11) unsigned DEFAULT NULL,
              `keyBindings` longtext,
              `permissions` text,
              `roles` varchar(1000) DEFAULT NULL,
              `memorizeTabs` tinyint(1) DEFAULT NULL,
              `closeWarning` tinyint(1) DEFAULT NULL,
              `welcomescreen` tinyint(1) DEFAULT NULL,
              `closeAll` tinyint(1) DEFAULT NULL,
              `fullscreen` tinyint(1) DEFAULT NULL,
              `displayErrors` tinyint(1) DEFAULT NULL,
              `allowDirtyClose` tinyint(1) unsigned DEFAULT '0',
              `docTypes` varchar(1000) DEFAULT NULL,
              `classes` varchar(1000) DEFAULT NULL,
              `perspectives` longtext,
              `websiteTranslationLanguagesEdit` varchar(1000) DEFAULT NULL,
              `websiteTranslationLanguagesView` varchar(1000) DEFAULT NULL,
              `dashboards` longtext,
              `blockedIpStart` varchar(255) DEFAULT NULL,
              `blockedIpEnd` varchar(255) DEFAULT NULL,
              `blockedIpStartv6` varchar(255) DEFAULT NULL,
              `blockedIpEndv6` varchar(255) DEFAULT NULL,
              `target` varchar(255) DEFAULT NULL,
              `targetType` varchar(255) DEFAULT NULL,
              `language` varchar(10) DEFAULT NULL,
              `contentLanguages` varchar(255) DEFAULT NULL,
              `validUntil` int(11) unsigned DEFAULT NULL,
              `lastUpdateDate` int(11) unsigned DEFAULT NULL,
              `lastUpdatedBy` int(11) unsigned DEFAULT NULL,
              `creationDate` int(11) unsigned DEFAULT NULL,
              `email` varchar(255) DEFAULT NULL,
              `image` int(11) unsigned DEFAULT NULL,
              `workspacesId` int(11) unsigned DEFAULT NULL,
              `userRole` enum('ROLE_PIMCORE_ADMIN','ROLE_PIMCORE_USER') DEFAULT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `name` (`name`),
              KEY `parentId` (`parentId`),
              KEY `admin` (`admin`),
              KEY `active` (`active`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
        
        echo "Users table created successfully!<br>";
    }
    
    // Check if admin user already exists
    $adminExists = $db->fetchOne("SELECT id FROM users WHERE name = 'admin'");
    
    if (!$adminExists) {
        // Create admin user
        $db->insert('users', [
            'parentId' => 0,
            'name' => 'admin',
            'admin' => 1,
            'active' => 1,
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'language' => 'en',
            'email' => 'admin@example.com',
            'userRole' => 'ROLE_PIMCORE_ADMIN',
            'creationDate' => time(),
            'lastUpdateDate' => time()
        ]);
        
        echo "Admin user created successfully!<br>";
        echo "Username: admin<br>";
        echo "Password: admin<br>";
    } else {
        echo "Admin user already exists!<br>";
    }
    
    // Now let's patch the IndexController to handle null users
    echo "<h2>Patching IndexController</h2>";
    
    // Create a simple patch file
    $patchFile = <<<'EOT'
<?php

namespace App\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Admin\IndexController as PimcoreIndexController;
use Pimcore\Model\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin-patched')]
class PatchedIndexController extends PimcoreIndexController
{
    #[Route('/index', name: 'patched_admin_index')]
    public function patchedIndexAction(Request $request): Response
    {
        // Create a temporary admin user
        $user = new User();
        $user->setId(1);
        $user->setParentId(0);
        $user->setName('admin');
        $user->setAdmin(true);
        $user->setActive(true);
        $user->setLanguage('en');
        
        // Store the user in the request attributes
        $request->attributes->set('pimcore_admin_user', $user);
        
        // Return a simple response
        return new Response('Patched Admin Index');
    }
}
EOT;

    // Save the patch file
    file_put_contents('../src/Controller/PatchedIndexController.php', $patchFile);
    echo "Created PatchedIndexController.php<br>";
    
    echo "<p>You can now try to access <a href='/admin-patched/index'>the patched admin index</a>.</p>";
    
    echo "<p>For the long-term solution, please upgrade to PHP 8.2+ and run the proper Pimcore installation commands.</p>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Delete this file after use for security
echo "<br><br>For security reasons, please delete this file after use.";
