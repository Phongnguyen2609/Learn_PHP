<?php 
require_once "Rectangle.php";
class Square extends Rectangle {

    // constructor
    public function __construct($sideLength)
    {
        parent::__construct($sideLength, $sideLength);
    }

    public function chuVi()
    {
        return $this->get_chieuDai()* 4;
    }
}
?>