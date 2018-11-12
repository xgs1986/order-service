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
     *     consumes={"multipart/form-data"},
     *     summary="Crea una nueva compra",
     *     @SWG\Parameter(
     *         name="total_amount",
     *         in="formData",
     *         description="Importe total",
     *         required=true,
     *         type="number"
     *     ),
     *     @SWG\Parameter(
     *          name="order_lines",
     *          in="formData",
     *          required=true,
     *          type="array",
     *          @SWG\Items(
     *             @Model(type=AppBundle\Entity\OrderLine::class)
     *         )
     *     ),
     *     @SWG\Parameter(
     *         name="order_shipping_address",
     *         in="formData",
     *         description="Dirección de envio",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="order_billing_address",
     *         in="formData",
     *         description="Dirección de facturación",
     *         required=true,
     *         type="string"
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
    
    public function postNewOrderAction (Request $request)
    {
        $context = $this->get('user_service');
        $view = $context->register($request);
        return $this->handleView($view);
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
  

