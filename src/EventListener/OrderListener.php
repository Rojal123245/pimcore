<?php

namespace App\EventListener;

use Doctrine\ORM\Event\PostPersistEventArgs;

class OrderListener
{
    public function postPersist(PostPersistEventArgs $args): void
    {
        $entity = $args->getObject();
        
        // Add your order processing logic here
        // For example:
        // if ($entity instanceof Order) {
        //     // Handle order persistence
        // }
    }
}