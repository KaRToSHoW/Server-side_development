<?php  

    spl_autoload_register(function (string $className){
        require_once('../src/'.str_replace('\\','/', $className).'.php');
    });

    $user = new Models\Users\User('Ivan');
    $article = new Models\Articles\Article('new', 'text', $user);
    // var_dump($article);

    $controller = new Controllers\MainController;
    // $controller->main();
    if (!empty($_GET['name'])) $controller->sayHello($_GET['name']);

