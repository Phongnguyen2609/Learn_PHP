<?php
include 'Conncet.php';

class OrderDao extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrder(){
        $query = "SELECT id, customer_id, product_id, quantity, shipping, payment, created_date, completion_time, note FROM orders";
        $result = $this->conn->prepare($query);
        $result->execute();
        $orders = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($orders) > 0) {
            return $orders;
        } else {
            return "Not record";
        }
    }

    function addOrder(Order $order){
        $sql = "INSERT INTO orders (customer_id, product_id, quantity, total, shipping, payment, created_date, completion_time, note) 
        VALUES (:customer_id, :product_id, :quantity, :total, :shipping, :payment, :created_date, :completion_time, :note)";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":customer_id", $order->getCustomerId(), PDO::PARAM_INT);
        $result->bindValue(":product_id", $order->getProductId(), PDO::PARAM_INT);
        $result->bindValue(":quantity", $order->getQuantity(), PDO::PARAM_INT);
        $result->bindValue(":total", $order->getTotal(), PDO::PARAM_INT);
        $result->bindValue(":shipping", $order->getShipping(), PDO::PARAM_STR);
        $result->bindValue(":payment", $order->getPayment(), PDO::PARAM_STR);
        $result->bindValue(":created_date", $order->getCreatedDate(), PDO::PARAM_STR);
        $result->bindValue(":completion_time", $order->getCompletionTime(), PDO::PARAM_STR);
        $result->bindValue(':note', $order->getNote(), PDO::PARAM_STR);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    function updateOrder($id, Order $order){
        $sql = "UPDATE orders  SET customer_id=:customer_id, product_id=:product_id, quantity=:quantity, total=:total, shipping=:shipping, payment=:payment, completion_time=:completion_time, note=:note WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":customer_id", $order->getCustomerId(), PDO::PARAM_INT);
        $result->bindValue(":product_id", $order->getProductId(), PDO::PARAM_INT);
        $result->bindValue(":quantity", $order->getQuantity(), PDO::PARAM_INT);
        $result->bindValue(":total", $order->getTotal(), PDO::PARAM_INT);
        $result->bindValue(":shipping", $order->getShipping(), PDO::PARAM_STR);
        $result->bindValue(":payment", $order->getPayment(), PDO::PARAM_STR);
        $result->bindValue(":completion_time", $order->getCompletionTime(), PDO::PARAM_STR);
        $result->bindValue(':note', $order->getNote(), PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCustomer(){
        $query = "SELECT id, username, email, phone, address FROM customers";
        $result = $this->conn->prepare($query);
        $result->execute();
        $customers = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($customers) > 0) {
            return $customers;
        } else {
            return "Not record";
        }
    }

    public function getAllProduct(){
        $query = "SELECT id, name, image, price, quantity, description FROM products";
        $result = $this->conn->prepare($query);
        $result->execute();
        
        $cruds = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($cruds) > 0){
            return $cruds;
        } else {
            return false;
        }
    }

    public function detailOrder($id){
        $query = "SELECT * FROM orders WHERE id=:id";
        $result = $this->conn->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $rows = array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
    }

    public function detailCustomer($id)
    {
        $query = "SELECT * FROM customers WHERE id=:id";
        $result = $this->conn->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $rows = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function detailProduct($id){
        $query = "SELECT * FROM products WHERE id=:id";
        $result = $this->conn->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $rows = array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
    }

    //join với bảng customer và bảng product
    public function getAllOrderMultipTable(){
        $query = 'SELECT c.username, p.name, od.quantity, od.shipping, od.payment, od.created_date, od.completion_time, od.note FROM orders as od left join customers as c ON od.customer_id = c.id left join products as p ON od.product_id = p.id';
        $result = $this->conn->prepare($query);
        $result->execute();
        $orders = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($orders) > 0) {
            return $orders;
        } else {
            return "Not record";
        }
    }

    public function updateProductQuantity($id, Product $product){
        $sql = "UPDATE products SET quantity=:quantity WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":quantity", $product->getQuantity(), PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }
}