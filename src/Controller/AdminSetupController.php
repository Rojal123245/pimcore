<?php

namespace App\Controller;

use Pimcore\Model\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSetupController extends AbstractController
{
    #[Route('/admin-setup/create-user', name: 'app_admin_setup_create_user')]
    public function createAdminUser(UserPasswordEncoderInterface $passwordEncoder): Response
    {
        try {
            // Check if admin user already exists
            $existingUser = User::getByName('admin');

            if ($existingUser) {
                return new Response('Admin user already exists!');
            }

            // Create new admin user
            $user = new User();
            $user->setParentId(0);
            $user->setName('admin');
            $user->setPassword(password_hash('admin', PASSWORD_DEFAULT));
            $user->setRoles(['ROLE_PIMCORE_ADMIN']);
            $user->setActive(true);
            $user->setAdmin(true);
            $user->setEmail('admin@example.com');
            $user->setLanguage('en');
            $user->save();

            return new Response('Admin user created successfully!');
        } catch (\Exception $e) {
            return new Response('Error creating admin user: ' . $e->getMessage());
        }
    }
}
