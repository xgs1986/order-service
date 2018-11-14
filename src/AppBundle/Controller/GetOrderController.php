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
class GetOrderController extends FOSRestController
{
     /**
     * @SWG\Get(
     *     tags={"order"},
     *     summary="Obtengo el pedido por identificador",
     *     @SWG\Parameter(
     *         name="field",
     *         in="query",
     *         description="id del pedido",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="value",
     *         in="query",
     *         description="id del pedido",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response="200",
     *         description="Obtengo el pedido"
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Bad request"
     *     )
     * )
     * 
     * @Route("/order", methods={"GET"})
     *
     * @param Request $request
     */
    
    public function getOrderAction (Request $request)
    {
       $finder = $this->container->get('fos_elastica.finder.app.order');
                $boolQuery = new \Elastica\Query\BoolQuery();
        
                $fieldQuery = new \Elastica\Query\Match();
                $fieldQuery->setFieldQuery('id', '5bec20a43309132dcc006957');
                $boolQuery->addShould($fieldQuery);
        
        
            $data = $finder->find($boolQuery);
            
            var_dump($data);exit;
        return $this->handleView($view);
    }
}