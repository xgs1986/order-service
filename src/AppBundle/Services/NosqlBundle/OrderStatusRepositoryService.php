<?php

namespace AppBundle\Services\NosqlBundle;

use AppBundle\Document\OrderStatus;
use AppBundle\Utils\Utilities;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Servicio que persiste en elastic un nuevo estado de un pedido
 */
class OrderStatusRepositoryService
{
    private $logger;
    private $dbConnector;
    
    public function __construct($dbConnector, $logger)
    {        
        $this->dbConnector = $dbConnector;
        $this->logger = $logger;
    }
    
    public function add($params)
    {
        try
        {
            $order = new OrderStatus();
            $order->setStatus($params['status']);
            $order->setIdOrder($params['id_order']);
            $order->setDateStatus(Utilities::getToday());
            
          
            $dm = $this->dbConnector->getManager();
            $dm->persist($order);
            $dm->flush();
            return $order->getId();
        }
        
        catch (\Exception $e)
        {
            $statusCodeError = $e->getCode();
            throw new HttpException($statusCodeError, $e->getMessage());
        }        
    }
}