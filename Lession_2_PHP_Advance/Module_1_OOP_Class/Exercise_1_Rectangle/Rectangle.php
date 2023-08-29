<?php
class Rectangle {
    private $chieuDai;
    private $chieuRong;

    // constructor
    public function __construct($chieuDai, $chieuRong)
    {
        $this->chieuDai = $chieuDai;
        $this->chieuRong = $chieuRong;
    }

    //setter + getter
    public function get_chieuDai(){
        return $this->chieuDai;
    }

    public function get_chieuRong(){
        return $this->chieuRong;
    }

    public function chuVi(){
        return ($this->chieuDai + $this->chieuRong) * 2;
    }

    public function dienTich() {
        return $this->chieuDai * $this->chieuRong;
    }
}

?>