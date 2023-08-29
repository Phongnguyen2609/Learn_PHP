<?php
include 'Conncet.php';

class PaymentDao extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPayment($query){
        $result = $this->conn->prepare($query);
        $result->execute();
        $payments = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($payments) > 0) {
            return $payments;
        } else {
            return false;
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

    public function addPayment(Payment $paymnet){
        $sql = "INSERT INTO payments (payment_type) VALUES (:payment_type)";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":payment_type", $paymnet->getPaymentType(), PDO::PARAM_STR);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function updatePayment($id, Payment $paymnet){
        $sql = "UPDATE payments SET payment_type=:payment_type WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":payment_type", $paymnet->getPaymentType(), PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function detailPayment($id){
        $sql = 'SELECT * FROM payments WHERE id=:id';
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $rows = array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		return $rows;
    }

    public function deletePayment($id)
    {
        $sql = "DELETE FROM payments WHERE id = :id";
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