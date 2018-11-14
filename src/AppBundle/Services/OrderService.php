<?php

namespace AppBundle\Services;

class OrderService
{
    private $logger;
    private $repository;
    
    public function __construct($logger, $repository)
    {
        $this->logger = $logger;
        $this->repository = $repository;
    }
    
    public function createOrder($params)
    {
        $this->logger->info('Nueva compra con parámetros ' . json_encode($params));
        $id = $this->repository->create($params);
        
        var_dump($id);exit;
    }
}
