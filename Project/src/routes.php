<?php
    return [
        '/^hello\/(.*)$/' => [\Controllers\MainController::class,'sayHello'],
        '/^$/' => [\Controllers\MainController::class,'main'],
        '/articles/' => [\Controllers\ArticleController::class,'index'],
        '/^article$/' => [\Controllers\ArticleController::class,'create'],
        '~^article/(\d+)$~'=> [\Controllers\ArticleController::class,'show'],
    ];