<?php


function connectDB(){
    
    $ini = parse_ini_file("/var/pass/trees.ini");

    $user = $ini['user'];
    $password = $ini['password'];
    $host = $ini['host'];
    $database = $ini['database'];

    $dsn = "mysql:host=$host;dbname=$database;port=3306;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $password);
    } 
    catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
    return $pdo;
}

?>