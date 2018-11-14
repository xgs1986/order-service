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
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     summary="Crea una nueva compra",
     *     @SWG\Parameter(
     *         name="order",
     *         in="body",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Order")
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
        $params = $request->request->all();
        
        $order = $this->get('order_service');

        $view = $order->createOrder($params);
        return $this->handleView($view);
    }
}