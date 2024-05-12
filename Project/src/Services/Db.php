<?php

namespace Services;

class Db{
    private $pdo;

    public function __construct(){
        $db = require('settings.php');
        $this->pdo = new \PDO(
            'mysql:host='.$db['host'].';dbname='.$db['dbname'],
            $db['user'],
            $db['password']
        );
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if ($result === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}