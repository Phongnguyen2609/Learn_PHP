<?php

class Shipping {
    private $id;
    private $shipping_type;

    public function __construct($shipping_type = "")
    {
        $this->shipping_type = $shipping_type;
    }

     // SETTER + GETTER
     public function setId($id)
     {
         $this->id = $id;
     }
 
     public function getId()
     {
         return $this->id;
     }
 
     public function setShippingType($shipping_type)
     {
         $this->shipping_type = $shipping_type;
     }
 
     public function getShippingType()
     {
         return $this->shipping_type;
     }
 
}