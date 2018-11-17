<?php

namespace AppBundle\Services;

// Servicio que gestiona los pedidos. Puerto de entrada de los controller
class OrderService
{
    private $logger;
    private $orderRepository;
    private $orderStatusRepository;
    private $orderSearcher;
    private $orderStatusSearcher;
    private $responseView;
    
    const DEFAULT_STATUS = "Pending Confirmation";
    
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
        
        $orderRepositoryParams = array ("status" => self::DEFAULT_STATUS, "id_order" => $id);
        $this->createOrderStatus($orderRepositoryParams);
        
        $this->logger->info('Se ha creado una nueva compra ' . json_encode($params));
        return $this->responseView->getSuccessView($result);
    }
    
    public function createOrderStatus($orderRepositoryParams)
    {
        $this->logger->info('Nueva actualizacion de un status de compra ' . json_encode($orderRepositoryParams));
        $orderStatusId = $this->orderStatusRepository->add($orderRepositoryParams);
        $result = array();
        array_push($result, array ("statusOrderId" => $orderStatusId));
        
        $this->logger->info('Se ha actualizado el status de la compra ' . json_encode($orderRepositoryParams));
        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderById($value) {
        $order = $this->orderSearcher->searchOrderById($value);
        $result = array();
        array_push($result, array ("order" => $order));
        
        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderStatusById($value) {
        $order = $this->orderStatusSearcher->searchOrderById($value);
        $result = array();
        array_push($result, array ("status" => $order));
        
        return $this->responseView->getSuccessView($result);
    }
}
