<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Order
{
    //http://www.inanzzz.com/index.php/post/bxfp/creating-a-symfony-base-example-application-that-handles-elasticsearch-for-mongodb
    /**
     * @MongoDB\Id
     */
    protected $id;
   
    /**
     * @MongoDB\Field(type="float")
     */
    protected $total_amount;
    
    /**
     * @MongoDB\Field(name="order_lines", type="hash")
     */
    protected $order_lines;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_shipping_address;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_billing_address;
    

    public function getId()
    {
        return $this->id;
    }

    public function setTotalAmount($totalAmount)
    {
        $this->total_amount = $totalAmount;
        return $this;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function setOrderLines($orderLines)
    {
        $this->order_lines = $orderLines;
        return $this;
    }

    public function getOrderLines()
    {
        return $this->order_lines;
    }

    public function setOrderShippingAddress($orderShippingAddress)
    {
        $this->order_shipping_address = $orderShippingAddress;
        return $this;
    }

    public function getOrderShippingAddress()
    {
        return $this->order_shipping_address;
    }

   
    public function setOrderBillingAddress($orderBillingAddress)
    {
        $this->order_billing_address = $orderBillingAddress;
        return $this;
    }


    public function getOrderBillingAddress()
    {
        return $this->order_billing_address;
    }
}
