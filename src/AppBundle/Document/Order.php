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
    protected $order_lines;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_shipping_address;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $order_billing_address;
    
}
