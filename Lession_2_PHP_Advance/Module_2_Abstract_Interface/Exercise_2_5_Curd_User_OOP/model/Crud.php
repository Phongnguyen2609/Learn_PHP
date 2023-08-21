<?php

include_once('Connect.php');

class Crud extends Connect
{

    public function __construct()
    {
        parent::__construct();
    }

    // Method get data to mysql
    public function getAllData($query)
    {
        try {
            $result = $this->conn->prepare($query);
            $result->execute();
            return $result->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getData($query)
    {
        try {
            $result = $this->conn->prepare($query);
            return $result->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert()
    {
    }

    public function login()
    {
        
    }

    public function update($query)
    {
        try {
            $result = $this->conn->prepare($query);
            // $result->execute([$this->username, $this->email, $this->phone, $this->age, $this->gender, $this->id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id, $table)
    {
        $query = $this->conn->prepare("DELETE FROM users WHERE id=?");
        $result = $this->conn->query($query);
    }

    // public function escape_string($value)
    // {
    //     return $this->conn->real_escape_string($value);
    // }
}
