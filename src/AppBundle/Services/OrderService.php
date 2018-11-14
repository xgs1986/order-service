<?php

namespace AppBundle\Services;

class OrderService
{
    private $logger;
    private $repository;
    private $searcher;
    private $responseView;
    
    public function __construct($repository, $searcher, $responseView, $logger)
    {
        $this->repository = $repository;
        $this->searcher = $searcher;
        $this->responseView = $responseView;
        $this->logger = $logger;
    }
    
    public function createOrder($params)
    {
        $this->logger->info('Nueva compra con parámetros ' . json_encode($params));
        $id = $this->repository->create($params);
        $result = array();
        array_push($result, array ("_id" => $id));
        
        return $this->responseView->getSuccessView($result);
    }
    
    public function getOrderById($value) {
        $order = $this->searcher->searchOrderById($value);
        $result = array();
        array_push($result, array ("order" => $order));
        
        return $this->responseView->getSuccessView($result);
    }
}
