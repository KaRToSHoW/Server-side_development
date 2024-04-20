<?php
namespace Models\Articles;
use Models\Users\User;

class Article{
    public function __construct(
        private $title,
        private $text, 
        private User $author_id
        ){}
    public function getAuthor(): User
    {
        return $this->author_id;
    }
}