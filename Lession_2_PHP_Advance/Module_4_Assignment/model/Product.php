<?php

class Product
{
    private $id;
    private $name;
    private $image;
    private $price;
    private $quantity;
    private $description;

    public function __construct($name = "",  $image = "",  $price = "", $quantity = "", $description = "")
    {
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
