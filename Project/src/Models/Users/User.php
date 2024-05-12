<?php
namespace Models\Users;

class User{

        private string $nickname;
        private string $email;
        private string $role;
        private string $id;

        public function getNickname(){
            return $this->nickname;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getRole(){
            return $this->role;
        }
        public function getId(){
            return $this->id;
        }
    }