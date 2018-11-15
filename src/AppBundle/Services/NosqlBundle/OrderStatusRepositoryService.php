<?php

namespace AppBundle\Services\NosqlBundle;

use AppBundle\Document\OrderStatus;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Utils\ApiException;
use AppBundle\Utils\Utilities;


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
            $order->setIdStatus($params['id_status']);
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