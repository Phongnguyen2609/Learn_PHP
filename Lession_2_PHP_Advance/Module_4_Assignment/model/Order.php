<?php
class Order {
    private $id;
    private $customerId;
    private $productId;
    private $quantity;
    private $total;
    private $shippingId;
    private $paymentId;
    private $created_date;
    private $completion_time;
    private $note;

    public function __construct($customerId ="", $productId = "", $quantity = "", $total = "", $shippingId = "", $paymentId = "", $created_date = "", $completion_time = "", $note ="")
    {
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->total = $total;        
        $this->shippingId = $shippingId;        
        $this->paymentId = $paymentId;        
        $this->created_date = $created_date;        
        $this->completion_time = $completion_time;        
        $this->note = $note;   
    }

    //SETTER + GETTER
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setCustomerId($customerId){
        $this->customerId = $customerId;
    }

    public function getCustomerId(){
        return $this->customerId;
    }

    public function setProductId($productId){
        $this->productId = $productId;
    }

    public function getProductId(){
        return $this->productId;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setTotal($total){
        $this->total = $total;
    }

    public function getTotal(){
        return $this->total;
    }

    public function setShippingId($shippingId){
        $this->shippingId = $shippingId;
    }

    public function getShippingId(){
        return $this->shippingId;
    }

    public function setPaymentId($paymentId){
        $this->paymentId = $paymentId;
    }

    public function getPaymentId(){
        return $this->paymentId;
    }

    public function setCreatedDate($created_date){
        $this->created_date = $created_date;
    }

    public function getCreatedDate(){
        return $this->created_date;
    }

    public function setCompletionTime($completion_time){
        $this->completion_time = $completion_time;
    }

    public function getCompletionTime(){
        return $this->completion_time;
    }

    public function setNote($note){
        $this->note = $note;
    }

    public function getNote(){
        return $this->note;
    }
}