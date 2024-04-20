<?php
interface CalculateSquare {
    public function calculateArea();
}

class Circle implements CalculateSquare {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }
}

class Square  {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function getSide() {
        return $this->side;
    }
    
}

function displayArea($object) {
    if ($object instanceof CalculateSquare) {
        echo "Площадь объекта типа " . get_class($object) . " равна " . $object->calculateArea() . "<br>";
    } else {
        echo "Объект класса " . get_class($object) . " не реализует интерфейс CalculateSquare"."<br>";
    }
}

$circle = new Circle(10);
$square = new Square(4);

displayArea($circle); 
displayArea($square);
?>