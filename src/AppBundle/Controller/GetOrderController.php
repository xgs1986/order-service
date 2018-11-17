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
 * Obtenemos un pedido dado su id
 */
class GetOrderController extends FOSRestController
{
     /**
     * @SWG\Get(
     *     tags={"order"},
     *     summary="Obtengo el pedido por identificador",
     *     @SWG\Parameter(
     *         name="id",
     *         in="query",
     *         description="valor del filtro",
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
     * @Route("order", methods={"GET"})
     *
     * @param Request $request
     */
    
    public function getOrderAction (Request $request)
    {
        $order = $this->get('order_service');
        $view = $order->getOrderById($request->get('id'));       
        return $this->handleView($view);
    }
}