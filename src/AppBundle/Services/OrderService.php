<?php

namespace AppBundle\Services;

class OrderService
{
    private $logger;
    private $repository;
    private $responseView;
    
    public function __construct($repository, $responseView, $logger)
    {
        $this->repository = $repository;
        $this->responseView = $responseView;
        $this->logger = $logger;
    }
    
    public function createOrder($params)
    {
        $this->logger->info('Nueva compra con parámetros ' . json_encode($params));
        $id = $this->repository->create($params);
        $result = array();
        array_push($result, array ("id" => $id));
        
        return $this->responseView->getSuccessView($result);
    }
}
