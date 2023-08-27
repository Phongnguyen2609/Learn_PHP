<?php
include 'Conncet.php';

class CustomerDao extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
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

    public function database_add(Customer $customer)
    {
        $username = $customer->getUsername();
        $email = $customer->getEmail();
        $phone = $customer->getPhone();
        $address = $customer->getAddress();
        $password = $customer->getPassword();

        $query = "INSERT INTO customers (username, email, phone, address, role, password) VALUES (:username, :email, :phone, :address, :role, :password)";
        $result = $this->conn->prepare($query);
        $result->bindValue(":username", $username, PDO::PARAM_STR);
        $result->bindValue(":email", $email, PDO::PARAM_STR);
        $result->bindValue(":phone", $phone, PDO::PARAM_STR);
        $result->bindValue(":address", $address, PDO::PARAM_STR);
        $result->bindValue(":role", 'user', PDO::PARAM_STR);
        $result->bindValue(":password", $password, PDO::PARAM_STR);
        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function customer_update($id, Customer $customer)
    {
        $password = $customer->getPassword();
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE customers SET username=:username, email=:email, phone=:phone, address=:address, role=:role, password=:password WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":username", $customer->getUsername(), PDO::PARAM_STR);
        $result->bindValue(":email", $customer->getEmail(), PDO::PARAM_STR);
        $result->bindValue(":phone", $customer->getPhone(), PDO::PARAM_STR);
        $result->bindValue(":address", $customer->getAddress(), PDO::PARAM_STR);
        $result->bindValue(":password", $hash_pass, PDO::PARAM_STR);
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

    public function SignIn(Customer $customer)
    {
        $username = $customer->getUsername();
        $password = $customer->getPassword();

        $sql = "SELECT * FROM customers WHERE username=$username AND password=$password";
        $result = $this->conn->prepare($sql);
        // $record = $result->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        } else {
            return false;
        }
        //         var_dump($result);
        // die;
    }
}
