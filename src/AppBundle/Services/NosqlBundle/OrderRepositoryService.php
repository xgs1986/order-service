<?php

namespace AppBundle\Services\NosqlBundle;

use AppBundle\Document\Order;



class OrderRepositoryService 
{
    private $logger;
    private $dbConnector;
    
    public function __construct($dbConnector, $logger)
    {        
        $this->dbConnector = $dbConnector;
        $this->logger = $logger;
    }
    
    public function create($params)
    {
        $order = new Order();
        $order->setTotalAmount($params['total_amount']);
        $order->setOrderBillingAddress($params['order_billing_address']);
        $order->setOrderShippingAddress($params['order_shipping_address']);
        $order->setOrderLines($params['order_lines']);
        
        $dm = $this->dbConnector->getManager();
        $dm->persist($order);
        $dm->flush();
        
        return $order->getId();
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
//     public function findOneByProperty($field, $data)
//     {
//         return
//         $this->createQueryBuilder('Order')
//         ->field($field)->equals($data)
//         ->getQuery()
//         ->getSingleResult();
//     }
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
