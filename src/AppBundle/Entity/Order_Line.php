<?php
namespace AppBundle\Entity;

class Order_Line
{
    private $item_sku;
    private $price;
    private $quantity;
    /**
     * @return mixed
     */
    public function getItem_sku()
    {
        return $this->item_sku;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $item_sku
     */
    public function setItem_sku($item_sku)
    {
        $this->item_sku = $item_sku;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}