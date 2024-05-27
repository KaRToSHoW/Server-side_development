<?php

use Controllers\MainController;
use Controllers\ArticleController;
use Controllers\CommentController;

return [
    '/^hello\/(.*)$/' => [MainController::class, 'sayHello'],
    '/^$/' => [MainController::class, 'main'],
    '/articles/' => [ArticleController::class, 'index'],
    '/^article$/' => [ArticleController::class, 'create'],
    '~^article/(\d+)$~' => [ArticleController::class, 'show'],
    '~^article/edit/(\d+)$~' => [ArticleController::class, 'edit'],
    '~^article/update/(\d+)$~' => [ArticleController::class, 'update'],
    '~^article/delete/(\d+)$~' => [ArticleController::class, 'delete'],
    '~^article/create$~' => [ArticleController::class, 'create'],
    '~^article/store$~' => [ArticleController::class, 'store'],
    '~^comment/edit/(\d+)$~' => [CommentController::class, 'edit'],
    '~^comment/update/(\d+)$~' => [CommentController::class, 'update'],
    '~^comment/delete/(\d+)$~' => [CommentController::class, 'delete'],
    '~^comment/create$~' => [CommentController::class, 'create'],
];
