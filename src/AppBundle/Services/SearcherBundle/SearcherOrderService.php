<?php

namespace AppBundle\Services\SearcherBundle;

class SearcherOrderService
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
        $fieldQuery->setFieldQuery("_id", $value);
        $boolQuery->addShould($fieldQuery);
        return $this->index->find($boolQuery);  
    }
}