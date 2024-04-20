<?php
class Cat {
    private $name;
    private $color;
    private $gender;

    public function __construct($name, $color, $gender) {
        $this->name = $name;
        $this->color = $color;
        $this->gender = $gender;
    }

    public function getName() {
        return $this->name;
    }

    public function getColor() {
        return $this->color;
    }

    public function getGender() {
        return $this->gender;
    }

    public function sayHello() {
        $pronoun = $this->gender === 'male' ? 'кот' : 'кошка';
        echo "Меня зовут " . $this->name . ", и я " . $this->color . "  {$pronoun}. Привет!<br>";
    }
}

$cat1 = new Cat("Мурка", "серая", "female");
$cat1->sayHello();

$cat2 = new Cat("Барсик", "рыжий", "male");
$cat2->sayHello();

echo "Цвет " . $cat1->getName() . ": " . $cat1->getColor() . "<br>"; 
echo "Цвет " . $cat2->getName() . ": " . $cat2->getColor() . "<br>"; 
?>
