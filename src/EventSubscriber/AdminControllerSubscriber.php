<?php

namespace App\EventSubscriber;

use Pimcore\Model\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AdminControllerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();
        
        // Check if it's an array (controller is a class method)
        if (!is_array($controller)) {
            return;
        }
        
        // Check if it's the IndexController
        if (is_object($controller[0]) && get_class($controller[0]) === 'Pimcore\Bundle\AdminBundle\Controller\Admin\IndexController') {
            // Create a temporary admin user and store it in the request attributes
            $request = $event->getRequest();
            
            // Only add the user if it doesn't already exist
            if (!$request->attributes->has('pimcore_admin_user')) {
                $user = new User();
                $user->setId(1);
                $user->setParentId(0);
                $user->setName('admin');
                $user->setAdmin(true);
                $user->setActive(true);
                $user->setLanguage('en');
                
                $request->attributes->set('pimcore_admin_user', $user);
            }
        }
    }
}
