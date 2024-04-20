<?php
    namespace Controllers;

    class MainController{
        public function main(){
            echo 'Загружено';
        }
        public function sayHello(string $name){
            echo "hello, $name";
            // $this->view->renderHtml('main/hello.php', ['name' => $name]);
        }
    }
