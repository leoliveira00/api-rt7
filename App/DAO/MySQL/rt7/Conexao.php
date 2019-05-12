<?php

namespace App\DAO\MySQL\rt7;

abstract class Conexao{
    
    /**
     * @var \PDO
     */
    protected  $pdo;
    
    public function __construct(){

        $host = getenv('RT7_MYSQL_HOST');
        $port = getenv("RT7_MYSQL_PORT");
        $user = getenv("RT7_MYSQL_USER");
        $pass = getenv("RT7_MYSQL_PASSWORD");
        $dbname = getenv("RT7_MYSQL_DBNAME");

        $dsn = "mysql:host={$host};dbname{$dbname};port=$port";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );        
    }    
}