<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Order
{
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
    protected $order_lines = array();
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_shipping_address;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_billing_address;
    

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set totalAmount
     *
     * @param float $totalAmount
     * @return $this
     */
    public function setTotalAmount($totalAmount)
    {
        $this->total_amount = $totalAmount;
        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return float $totalAmount
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * Set orderLines
     *
     * @param hash $orderLines
     * @return $this
     */
    public function setOrderLines($orderLines)
    {
        $this->order_lines = $orderLines;
        return $this;
    }

    /**
     * Get orderLines
     *
     * @return hash $orderLines
     */
    public function getOrderLines()
    {
        return $this->order_lines;
    }

    /**
     * Set orderShippingAddress
     *
     * @param string $orderShippingAddress
     * @return $this
     */
    public function setOrderShippingAddress($orderShippingAddress)
    {
        $this->order_shipping_address = $orderShippingAddress;
        return $this;
    }

    /**
     * Get orderShippingAddress
     *
     * @return string $orderShippingAddress
     */
    public function getOrderShippingAddress()
    {
        return $this->order_shipping_address;
    }

    /**
     * Set orderBillingAddress
     *
     * @param string $orderBillingAddress
     * @return $this
     */
    public function setOrderBillingAddress($orderBillingAddress)
    {
        $this->order_billing_address = $orderBillingAddress;
        return $this;
    }

    /**
     * Get orderBillingAddress
     *
     * @return string $orderBillingAddress
     */
    public function getOrderBillingAddress()
    {
        return $this->order_billing_address;
    }
}
