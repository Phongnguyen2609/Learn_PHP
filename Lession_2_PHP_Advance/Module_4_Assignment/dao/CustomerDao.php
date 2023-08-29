<?php
include 'Conncet.php';

class CustomerDao extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($query)
    {
        $result = $this->conn->prepare($query);
        $result->execute();
        $customers = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($customers) > 0) {
            return $customers;
        } else {
            return false;
        }
    }

    public function addCustomer(Customer $customer)
    {
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
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCustomer($id, Customer $customer)
    {

        $sql = "UPDATE customers SET username=:username, email=:email, phone=:phone, address=:address WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":username", $customer->getUsername(), PDO::PARAM_STR);
        $result->bindValue(":email", $customer->getEmail(), PDO::PARAM_STR);
        $result->bindValue(":phone", $customer->getPhone(), PDO::PARAM_STR);
        $result->bindValue(":address", $customer->getAddress(), PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function customer_delete($id)
    {
        $sql = "DELETE FROM customers WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function customer_detail($id)
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

    // public function SignIn(Customer $customer)
    // {
    //     $username = $customer->getUsername();
    //     $password = $customer->getPassword();

    //     $sql = "SELECT * FROM customers WHERE username=$username AND password=$password";
    //     $result = $this->conn->prepare($sql);
    //     // $record = $result->fetch(PDO::FETCH_ASSOC);

    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //     //         var_dump($result);
    //     // die;
    // }
}
