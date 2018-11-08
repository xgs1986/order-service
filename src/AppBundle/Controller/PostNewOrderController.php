<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Nelmio\ApiDocBundle\Annotation\Operation;
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
     *     summary="This endpoint makes the register possible",
     *     @SWG\Parameter(
     *         name="total_amount",
     *         in="formData",
     *         description="Email",
     *         required=true,
     *         type="number"
     *     ),
     *     @SWG\Parameter(
     *         name="username",
     *         in="formData",
     *         description="User Name",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         description="Password",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response="201",
     *         description="Returned when the register process is successful"
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
  

