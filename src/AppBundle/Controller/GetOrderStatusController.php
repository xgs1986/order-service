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
 * Obtenemos todos los status que tiene un pedido
 */
class GetOrderStatusController extends FOSRestController
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
     *         description="Obtengo los estados que ha tenido un pedido"
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Bad request"
     *     )
     * )
     * 
     * @Route("order/status", methods={"GET"})
     *
     * @param Request $request
     */
    
    public function getOrderStatusAction (Request $request)
    {
        $order = $this->get('order_service');
        $view = $order->getOrderStatusById($request->get('id'));       
        return $this->handleView($view);
    }
}