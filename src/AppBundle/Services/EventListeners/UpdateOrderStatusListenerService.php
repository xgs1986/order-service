<?php

namespace AppBundle\Services\EventListeners;

use FOS\ElasticaBundle\Event\IndexPopulateEvent;
use FOS\ElasticaBundle\Index\IndexManager;

class UpdateOrderStatusListenerService
{
    //http://www.inanzzz.com/index.php/post/67nu/creating-a-custom-listener-in-symfony-to-manually-update-elasticsearch-index-for-parent-object
    /**
     * @var IndexManager
     */
    private $indexManager;
    
    /**
     * @param IndexManager $indexManager
     */
    public function __construct($indexManager, $logger)
    {
        $this->indexManager = $indexManager;
    }
    
    public function preIndexPopulate(IndexPopulateEvent $event)
    {
        $this->logger->info('Antes de actualizar el order status');
        $index = $this->indexManager->getIndex($event->getIndex());
        $settings = $index->getSettings();
        $settings->setRefreshInterval(-1);
    }
    
    public function postIndexPopulate(IndexPopulateEvent $event)
    {
        $this->logger->info('Después de actualizar el order status');
        $index = $this->indexManager->getIndex($event->getIndex());
        $settings = $index->getSettings();
        $index->optimize(['max_num_segments' => 5]);
        $settings->setRefreshInterval('1s');
    }
}