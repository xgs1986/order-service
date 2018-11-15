<?php

namespace AppBundle\Services;

class OrderService
{
    private $logger;
    private $orderRepository;
    private $orderStatusRepository;
    private $orderSearcher;
    private $responseView;
    
    const DEFAULT_STATUS = "Pending Confirmation";
    
    public function __construct($orderRepository, $orderStatusRepository, $orderSearcher, $responseView, $logger)
    {
        $this->orderRepository = $orderRepository;
        $this->orderStatusRepository = $orderStatusRepository;
        $this->orderSearcher = $orderSearcher;
        $this->responseView = $responseView;
        $this->logger = $logger;
    }
    
    public function createOrder($params)
    {
        $this->logger->info('Nueva compra con parámetros ' . json_encode($params));
        $id = $this->orderRepository->create($params);
        $result = array();
        array_push($result, array ("_id" => $id));
        
        $orderRepositoryParams = array ("status" => self::DEFAULT_STATUS, "id_order" => $id);
        $this->createOrderStatus($orderRepositoryParams);
        
        return $this->responseView->getSuccessView($result);
    }
    
    public function createOrderStatus($orderRepositoryParams)
    {
        $orderStatusId = $this->orderStatusRepository->add($orderRepositoryParams);
        $result = array();
        array_push($result, array ("statusOrderId" => $orderStatusId));
        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderById($value) {
        $order = $this->orderSearcher->searchOrderById($value);
        $result = array();
        array_push($result, array ("order" => $order));
        
        return $this->responseView->getSuccessView($result);
    }
}
