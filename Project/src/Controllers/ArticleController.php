<?php

namespace Controllers;
use View\View;
use Services\Db;

class ArticleController{
    public $view;
    public $db;

    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
        $this->db = new Db;
    }
    
    public function index(){
        $sql = 'SELECT * FROM `articles`';
        $articles = $this->db->query($sql);
        // var_dump($articles);
        $this->view->renderHtml('articles/index.php', ['articles'=>$articles]);
    }

    public function show(int $id){
        $sql = 'SELECT * FROM `articles` WHERE `id`='.$id;
        $article = $this->db->query($sql);
        var_dump($article);
    }
}