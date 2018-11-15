<?php

namespace AppBundle\Services\SearcherBundle;

class SearcherOrderStatusService
{
    private $logger;
    private $index;
    
    public function __construct($index, $logger)
    {        
        $this->index = $index;
        $this->logger = $logger;
    }
    
    public function searchOrderStatusByOrderId($value)
    {
        $boolQuery = new \Elastica\Query\BoolQuery();

        $fieldQuery = new \Elastica\Query\Match();
        $fieldQuery->setFieldQuery("id_order", $value);
        $boolQuery->addShould($fieldQuery);
        return $this->index->find($boolQuery);  
    }
}