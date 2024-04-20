<?php
class Lesson {
    protected $title;
    protected $text;
    protected $homework;

    public function __construct($title, $text, $homework) {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function getHomework() {
        return $this->homework;
    }
}

class PaidLesson extends Lesson {
    private $price;

    public function __construct($title, $text, $homework, $price) {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}

$paidLesson = new PaidLesson(
    "Урок о наследовании в PHP",
    "Лол, кек, чебурек",
    "Ложитесь спать, утро вечера мудренее",
    99.90
);

var_dump($paidLesson);
?>
