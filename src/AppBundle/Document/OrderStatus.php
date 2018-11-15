<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class OrderStatus
{
    /**
     * @MongoDB\Id
     */
    protected $id;
   
    /**
     * @MongoDB\Field(type="string")
     */
    protected $id_order;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $status;
    
    /**
     * @MongoDB\Field(type="date")
     */
    protected $date_status;
    

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
     * Set idOrder
     *
     * @param string $idOrder
     * @return $this
     */
    public function setIdOrder($idOrder)
    {
        $this->id_order = $idOrder;
        return $this;
    }

    /**
     * Get idOrder
     *
     * @return string $idOrder
     */
    public function getIdOrder()
    {
        return $this->id_order;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateStatus
     *
     * @param date $dateStatus
     * @return $this
     */
    public function setDateStatus($dateStatus)
    {
        $this->date_status = $dateStatus;
        return $this;
    }

    /**
     * Get dateStatus
     *
     * @return date $dateStatus
     */
    public function getDateStatus()
    {
        return $this->date_status;
    }
}
