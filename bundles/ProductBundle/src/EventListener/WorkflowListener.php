<?php

namespace ProductBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class WorkflowListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'workflow.check_permissions' => 'checkPermissions',
        ];
    }

    public function checkPermissions(GenericEvent $event)
    {
        
    }


}