<?php
abstract class Car {
    /*
        tính trừu tượng không được khai báo private hay static
        => Vì phương thức trừu tượng chỉ được khai báo chi tiết(nạp chồng) trong các lớp dẫn xuất (lớp kế thừa) của lớp trừu tượng
        -> Nếu khai báo private thì sẽ không thể nạp chồng phương hay khai báo static thì sẽ không thể thay đổi lớp dẫn xuất
    */
    protected $name;
    protected $color;
    protected $price;
    
    public function __construct($name, $color, $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
    }

    abstract public function run();
}