<?php
namespace Models\Articles;

use Models\ActiveRecordEntity;
use Models\Users\User;

class Article extends ActiveRecordEntity{
            private $id;
            private $name;
            private $text;
            private $authorId;
            private $createdAt;

            private function formatUppercaseToCamelcase(string $key): string
            {
                return lcfirst(str_replace('_', '', ucwords($key, '_')));
            }

            public function __set($key, $value){
                $property = $this->formatUppercaseToCamelcase($key);
                $this->$property = $value;
            }

            public function getId(){
                return $this->id;
            }
            public function getName(){
                return $this->name;
            }
            public function getText(){
                return $this->text;
            }
            public function getAuthorId(){
                return $this->authorId;
            }

            protected static function getTableName(){
                return 'articles';
            }
    }