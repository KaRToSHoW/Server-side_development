<?php

namespace Controllers;

use View\View;
use Models\Articles\Article;
use Models\Users\User;
use Models\Comments\Comment;

class ArticleController {
    public $view;

    public function __construct() {
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index() {
        $articles = Article::findAll();
        $this->view->renderHtml('articles/index.php', ['articles' => $articles]);
    }

    public function show(int $id) {
        $article = Article::getById($id);
        if ($article === null) {  // Проверяем, что статья не null
            $this->view->renderHtml('errors/error.php', [], 404);
            return;
        }
        $user = User::getById($article->getAuthorId());
        $comments = Comment::getAllByArticleId($id);
        $this->view->renderHtml('articles/show.php', [
            'article' => $article,
            'user' => $user,
            'comments' => $comments
        ]);
    }
    

    public function create() {
        return $this->view->renderHtml('articles/create.php');
    }

    public function store() {
        $article = new Article();
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/articles');
    }

    public function edit($id) {
        $article = Article::getById($id);
        return $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function update($id) {
        $article = Article::getById($id);
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/articles'.$article->getId());
    }

    public function delete($id) {
        $article = Article::getById($id);
        $article->delete();
        header('Location: '.dirname($_SERVER['SCRIPT_NAME']).'/articles');
    }
}
