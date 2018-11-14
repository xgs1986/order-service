<?php

namespace AppBundle\Services\SearcherBundle;

class SearcherOrderService
{
    private $logger;
    private $dbConnector;
    
    public function __construct($searcher, $logger)
    {        
        $this->searcher = $searcher;
        $this->logger = $logger;
    }
    
    public function searchBy($field, $value)
    {
        $boolQuery = new \Elastica\Query\BoolQuery();

        $fieldQuery = new \Elastica\Query\Match();
        $fieldQuery->setFieldQuery($field, $value);
        $boolQuery->addShould($fieldQuery);

        var_dump($this->searcher->find($boolQuery));
        exit;
        return $this->searcher->find($boolQuery);  
    }
}
//     /**
//      * @return mixed
//      */
//     public function findAll()
//     {
//         return
//         $this->createQueryBuilder('Order')
//         ->sort('createdAt', 'desc')
//         ->getQuery()
//         ->execute();
//     }
    
//     /**
//      * @param string $field
//      * @param string $data
//      *
//      * @return array|null|object
//      */

//}

//         $product = new Order();
//         $product->setTotalAmount(19.99);

//         $dm = $this->get('doctrine_mongodb')->getManager();
//         $dm->persist($product);
//         $dm->flush();

//         $finder = $this->container->get('fos_elastica.finder.app.order');
//         $boolQuery = new \Elastica\Query\BoolQuery();

//         $fieldQuery = new \Elastica\Query\Match();
//         $fieldQuery->setFieldQuery('total_amount', 19.99);
//         $boolQuery->addShould($fieldQuery);


//         $data = $finder->find($boolQuery);

//         var_dump($data);
//         exit;



//         return new Response('Created product id '.$product->getId());
