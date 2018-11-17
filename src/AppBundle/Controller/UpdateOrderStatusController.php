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
 * Actualizamos un estado del pedido
 */
class UpdateOrderStatusController extends FOSRestController
{
      /**
     * @Operation(
     *     tags={"order"},
     *     consumes={"multipart/form-data"},
     *     summary="Actualizar un estado del pedido",
     *     @SWG\Parameter(
     *         name="id",
     *         in="formData",
     *         description="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="status",
     *         in="formData",
     *         enum={"Pending Confirmation", "Confirmed", "Sent to Warehouse", "Shipped", "In Transit", "Delivered"},
     *         default="Pending Confirmation",
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
        
        $orderRepositoryParams = array ("status" => $request->get('status'), "id_order" => $request->get('id'));
        
        $view = $order->createOrderStatus($orderRepositoryParams);
        return $this->handleView($view);
    }
}