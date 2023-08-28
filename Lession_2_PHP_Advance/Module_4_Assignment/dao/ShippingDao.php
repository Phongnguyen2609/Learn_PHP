<?php
include 'Conncet.php';

class ShippingDao extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllShipping(){
        $query = "SELECT id, shipping_type FROM shipping";
        $result = $this->conn->prepare($query);
        $result->execute();
        $shippings = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($shippings) > 0) {
            return $shippings;
        } else {
            return "Not record";
        }
    }

    public function getLastOrderRecord(){
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $rows = array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
    }

    public function addShipping(Shipping $shipping){
        $sql = "INSERT INTO shipping (shipping_type) VALUES (:shipping_type)";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":shipping_type", $shipping->getShippingType(), PDO::PARAM_STR);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function updateShipping($id, Shipping $shipping){
        $sql = "UPDATE shipping SET shipping_type=:shipping_type WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":shipping_type", $shipping->getShippingType(), PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function detailShipping($id){
        $sql = 'SELECT * FROM shipping WHERE id=:id';
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $rows = array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
    }

    public function deleteShipping($id)
    {
        $sql = "DELETE FROM shipping WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}