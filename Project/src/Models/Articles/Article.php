<?php
namespace Models\Articles;

use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity{
            protected $name;
            protected $text;
            protected $authorId;
            protected $createdAt;

            public function getName(){
                return $this->name;
            }
            public function getText(){
                return $this->text;
            }
            public function getAuthorId(){
                return $this->authorId;
            }
            public function setName(string $name){
                $this->name = $name;
            }
            public function setText(string $text){
                $this->text = $text;
            }
            public function setAuthorId(string $authorId){
                $this->authorId = $authorId;
            }

            protected static function getTableName(){
                return 'articles';
            }
            
    }