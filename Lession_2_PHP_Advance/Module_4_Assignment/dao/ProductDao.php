<?php
include 'Conncet.php';

class ProductDao extends Connect{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($query){
        $result = $this->conn->prepare($query);
        $result->execute();
        
        $cruds = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($cruds) > 0){
            return $cruds;
        } else {
            return false;
        }
    }

    public function addProduct(Product $product){
        $name = $product->getName();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $description = $product->getDescription();
        $query = 'INSERT INTO products (name, price, quantity, description) VALUES (:name, :price, :quantity, :description)';
        $result = $this->conn->prepare($query);
        $result->bindValue(":name", $name, PDO::PARAM_STR);
        $result->bindValue(":price", $price, PDO::PARAM_STR);
        $result->bindValue(":quantity", $quantity, PDO::PARAM_STR);
        $result->bindValue(":description", $description, PDO::PARAM_STR);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct($id, Product $product){
        $sql = "UPDATE products SET name=:name, price=:price, quantity=:quantity, description=:description WHERE id=:id";
        $result = $this->conn->prepare($sql);
        $result->bindValue(":name", $product->getName(), PDO::PARAM_STR);
        $result->bindValue(":price", $product->getPrice(), PDO::PARAM_STR);
        $result->bindValue(":quantity", $product->getQuantity(), PDO::PARAM_STR);
        $result->bindValue(":description", $product->getDescription(), PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM products WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        if($result){
            return true;
        } else {
            return false;
        }
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
}

