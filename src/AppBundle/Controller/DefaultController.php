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
        
        return new Response('Created product id '.$product->getId());
    }
}
