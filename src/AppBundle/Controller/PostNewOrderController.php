<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Nelmio\ApiDocBundle\Annotation\Operation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Nos permite registrarnos en la base de datos
 * @author XGS
 *
 */
class PostNewOrderController extends FOSRestController
{
    /**
     * @Operation(
     *     tags={"order"},
     *     consumes={"application/x-www-form-urlencoded"},
     *     summary="Crea una nueva compra",
     *     @SWG\Parameter(
     *         name="total_amount",
     *         in="body",
     *         description="Importe total",
     *         required=true,
     *         type="number",
     *         @SWG\Schema(type="number")
     *     ),
     *     @SWG\Parameter(
     *         name="order_shipping_address",
     *         in="body",
     *         description="Importe total",
     *         required=true,
     *         type="string",
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="order_billing_address",
     *         in="body",
     *         description="Importe total",
     *         required=true,
     *         type="string",
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="order_lines",
     *         type="array",
     *         in="body",
     *         required=true,
     *         @SWG\Schema(type="array", @SWG\Items(ref="#/definitions/OrderLines"))
     *     ),
     *     @SWG\Response(
     *         response="201",
     *         description="Retorna cuando se crea la orden de compra correctamente"
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Bad request"
     *     )
     * )
     *
     * @Route("order", methods={"POST"})
     *
     */
    
    public function postCreateOrderAction (Request $request)
    {
        var_dump("hola");
        exit; 
        //$context = $this->get('user_service');
        //$view = $context->register($request);
        //return $this->handleView($view);
    }
}


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


