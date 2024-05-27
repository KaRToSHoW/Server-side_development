<?php

    namespace Models;
    use Services\Db;


    abstract class ActiveRecordEntity{
        protected $id;

        private function formatUppercaseToCamelcase(string $key): string
        {
            return lcfirst(str_replace('_', '', ucwords($key, '_')));
        }
        private function formatToDb(string $key){
            return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
        }

        public function __set($key, $value){
            $property = $this->formatUppercaseToCamelcase($key);
            $this->$property = $value;
        }

        public function getId(){
            return $this->id;
        }
        public function getPropertyToDb(): array
        {
            $reflector = new \ReflectionObject($this);
            $properties = $reflector->getProperties();
            $nameAndValue = [];
            foreach($properties as $property){
                $propertyName = $property->getName();
                // echo "$propertyName<br>";
                $propertyNameToDb = $this->formatToDb($property->getName());
                $nameAndValue[$propertyNameToDb] = $this->$propertyName;
            }
            return $nameAndValue;
        }
        public static function findAll(): ?array
        {
            $db = Db::getInstance();
            $sql = 'SELECT * FROM `'.static::getTableName().'`';
            return $db->query($sql, [], static::class);
        }
        public static function getById(int $id): ?self
        {
            $db = Db::getInstance();
            $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
            $entyties = $db->query($sql, [], static::class);
            return $entyties ? $entyties[0] : null;
        }  
        public static function getFieldById(string $field, int $id): ?self
        {
            $db = Db::getInstance();
            $sql = 'SELECT `'.$field.'` FROM `'.static::getTableName().'` WHERE `id`='.$id;
            $entyties = $db->query($sql, [], static::class);
            return $entyties ? $entyties[0] : null;
        }
        public function save(){
            if ($this->getId()) $this->update();
            else $this->insert();
        }
        public function insert(){
            $db = Db::getInstance();
            $propertiesAndValues = array_filter($this->getPropertyToDb());
            $params = [];
            $parameter = [];
            $paramToValue = [];
            foreach($propertiesAndValues as $property=>$value){
                $param = ':'.$property;
                $params[] = '`'.$property.'`';
                $parameter [] = $param;
                $paramToValue[$param] = $value;
            }

            $sql = 'INSERT INTO `'.static::getTableName().'`
                    ('.implode(',', $params).') VALUES ('.implode(',', $parameter).')';
            $db->query($sql, $paramToValue, static::class);
            // var_dump($sql);
        }
        public function update(){
            $db = Db::getInstance();
            $propertiesAndValues = $this->getPropertyToDb();
            $paramToValue = [];
            $params = [];
            foreach($propertiesAndValues as $property=>$value){
                $param = ':'.$property;
                $params[] = '`'.$property.'`=:'.$property;
                $paramToValue[$param] = $value;
            }
            $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(',',$params).' WHERE `id`=:id';
            $db->query($sql, $paramToValue, static::class);
        }

        public function delete(){
            $db = Db::getInstance();
            $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
            $db->query($sql, [':id'=>$this->id], static::class);
        }
        abstract protected static function getTableName();
    }