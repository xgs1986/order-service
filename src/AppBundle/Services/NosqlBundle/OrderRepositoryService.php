<?php

namespace AppBundle\Services\NosqlBundle;

use AppBundle\Document\Order;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Utils\ApiException;
use Doctrine\ODM\MongoDB\DocumentRepository;
use AppBundle\Entity\Order_Line;

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
//             foreach($params['order_lines'] as $newProduct) {
//                 $orderLine = new Order_Line();
//                 $orderLine->setSku($newProduct['sku']);
//                 $orderLine->setPrice($newProduct['price']);
//                 $orderLine->setQuantity($newProduct['quantity']);
//                 //$order->addOrderLine($orderLine);
//             }
            
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