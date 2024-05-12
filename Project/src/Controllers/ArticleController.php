<?php

namespace Controllers;
use View\View;
use Models\Articles\Article;
use Models\Users\User;

class ArticleController{
    public $view;

    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');

    }
    
    public function index(){
        $articles = Article::findAll();
        // var_dump($articles);
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        // $sql = 'SELECT * FROM `articles` WHERE `id`='.$id;
        // $article = $this->db->query($sql, [], Article::class);
        // if ($article === []){
        //     $this->view->renderHtml('errors/error.php', [], 404);
        //     return;
        // }
        // $sql_user = 'SELECT `nickname` FROM `users` WHERE `id`='.$article[0]->getAuthorId();
        // $user = $this->db->query($sql_user, [], User::class);
        // // var_dump($article);
        // // echo '<br>';
        // // var_dump($user);
        // $this->view->renderHtml('articles/show.php', ['article'=>$article[0], 'user'=>$user[0]]);
    }
}