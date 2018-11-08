<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Document\Order;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    //http://www.inanzzz.com/index.php/post/bxfp/creating-a-symfony-base-example-application-that-handles-elasticsearch-for-mongodb
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $product = new Order();
        $product->setTotalAmount(19.99);
        
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();
        
<<<<<<< HEAD
        $finder = $this->container->get('fos_elastica.finder.app.order');
        $boolQuery = new \Elastica\Query\BoolQuery();
        
        $fieldQuery = new \Elastica\Query\Match();
        $fieldQuery->setFieldQuery('total_amount', 19.99);
        $boolQuery->addShould($fieldQuery);
        
        
        $data = $finder->find($boolQuery);
        
        var_dump($data);
        exit;
        
        
=======
>>>>>>> branch 'master' of https://github.com/xgs1986/order-service.git
        return new Response('Created product id '.$product->getId());
    }
}
