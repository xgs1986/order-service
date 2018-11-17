<?php

namespace AppBundle\Services\SearcherBundle;

/**
 * Servicio que permite obtener los diferentes status de un pedido
 */

class SearcherOrderStatusService
{
    private $logger;
    private $index;
    
    public function __construct($index, $logger)
    {        
        $this->index = $index;
        $this->logger = $logger;
    }
    
    public function searchOrderById($value)
    {
        $boolQuery = new \Elastica\Query\BoolQuery();

        $fieldQuery = new \Elastica\Query\Match();
        $fieldQuery->setFieldQuery("id_order", $value);
        $boolQuery->addShould($fieldQuery);
        return $this->index->find($boolQuery);  
    }
}