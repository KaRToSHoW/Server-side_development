<?php

    namespace Models;
    use Services\Db;


    abstract class ActiveRecordEntity{
        private static $db;
        public function __construct()
        {
            self::$db = new Db;
        }
        public static function findAll(){
            $sql = 'SELECT * FROM `'.static::getTableName().'`';
            return self::$db->query($sql, [], static::class);
        }
        abstract protected static function getTableName();
    }