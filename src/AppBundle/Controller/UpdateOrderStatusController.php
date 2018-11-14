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
class UpdateOrderStatusController extends FOSRestController
{
      /**
     * @Operation(
     *     tags={"order"},
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     summary="Actualizo el status de una orden",
     *     @SWG\Parameter(
     *         name="id",
     *         in="formData",
     *         description="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="estado",
     *         in="formData",
     *         enum={"available", "discontinued"},
     *         default="available",
     *         description="status",
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
     * @Route("order/update_status", methods={"POST"})
     *
     */
    
    public function postUpdateOrderStatusAction (Request $request)
    {
        $order = $this->get('order_service');
        $view = $order->getOrderById($request->get('id'));       
        return $this->handleView($view);
    }
}