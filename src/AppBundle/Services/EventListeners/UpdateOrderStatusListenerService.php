<?php

namespace AppBundle\Services\EventListeners;

use FOS\ElasticaBundle\Event\IndexPopulateEvent;
use FOS\ElasticaBundle\Index\IndexManager;
use AppBundle\Document\OrderStatus;

class UpdateOrderStatusListenerService
{
    private $logger;
    
    public function __construct($logger)
    {
        $this->logger = $logger;
    }
        
    public function postPersist($event)
    {
        $entity = $event->getEntity();
       
        if ($entity instanceOf OrderStatus) 
        {
            $this->logger->info('Se ha creado un nuevo order_status. Event trigger');   
        }
    }
}