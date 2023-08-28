<?php

class Payment {
    private $id;
    private $payment_type;

    public function __construct($payment_type = "")
    {
        $this->payment_type = $payment_type;
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
 
     public function setPaymentType($payment_type)
     {
         $this->payment_type = $payment_type;
     }
 
     public function getPaymentType()
     {
         return $this->payment_type;
     }
 
}