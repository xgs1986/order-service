<?php

namespace AppBundle\Services\NosqlBundle;

use AppBundle\Document\Order;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Servicio que persiste un nuevo indice en elastic de un pedido
 */
class OrderRepositoryService
{
    private $logger;
    private $dbConnector;
    
    public function __construct($dbConnector, $logger)
    {        
        $this->dbConnector = $dbConnector;
        $this->logger = $logger;
    }
    
    public function create($params)
    {
        try
        {
            $order = new Order();
            $order->setTotalAmount($params['total_amount']);
            $order->setOrderBillingAddress($params['order_billing_address']);
            $order->setOrderShippingAddress($params['order_shipping_address']);
            
            $order->setOrderLines($params['order_lines']);

            
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