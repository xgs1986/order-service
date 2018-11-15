<?php

namespace AppBundle\Services;

class OrderService
{
    private $logger;
    private $orderRepository;
    private $orderStatusRepository;
    private $orderSearcher;
    private $orderStatusSearcher;
    private $responseView;
    
    public function __construct($orderRepository, $orderStatusRepository, $orderSearcher, $orderStatusSearcher, $responseView, $logger)
    {
        $this->orderRepository = $orderRepository;
        $this->orderStatusRepository = $orderStatusRepository;
        $this->orderSearcher = $orderSearcher;
        $this->orderStatusSearcher = $orderStatusSearcher;
        $this->responseView = $responseView;
        $this->logger = $logger;
    }
    
    public function createOrder($params)
    {
        $this->logger->info('Nueva compra con parámetros ' . json_encode($params));
        $id = $this->orderRepository->create($params);
        $result = array();
        array_push($result, array ("_id" => $id));
        
        $orderRepositoryParams = array ("id_status" => 0, "id_order" => $id);
        $this->orderStatusRepository->add($orderRepositoryParams);

        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderById($value) {
        $order = $this->orderSearcher->searchOrderById($value);
        $result = array();
        array_push($result, array ("order" => $order));
        
        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderStatusById($value) 
    {
        $statusId = $this->orderStatusSearcher->searchOrderStatusByOrderId($value);
        $result = array();
        array_push($result, array ("statusId" => $statusId));
        
        return $this->responseView->getSuccessView($result);
    }
}
