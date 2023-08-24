<?php
include 'Conncet.php';

class CustomerDao extends Connect{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData() {
        $query = "SELECT id, username, email, phone, address FROM customers";
        $result = $this->conn->prepare($query);
        $result->execute();
        $customers = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($customers) > 0){
            return $customers;
        } else {
            return "Not record";
        }
    }

    public function database_add(Customer $customer){
        $username = $customer->getUsername();
        $email = $customer->getEmail();
        $phone = $customer->getPhone();
        $address = $customer->getAddress();

        $query = "INSERT INTO customers (username, email, phone, address) VALUES (:username, :email, :phone, :address)";
        $result = $this->conn->prepare($query);
        $result->bindValue(":username", $username, PDO::PARAM_STR);
        $result->bindValue(":email", $email, PDO::PARAM_STR);
        $result->bindValue(":phone", $phone, PDO::PARAM_STR);
        $result->bindValue(":address", $address, PDO::PARAM_STR);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function customer_delete($id){
        $sql = "DELETE FROM customers WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }
}