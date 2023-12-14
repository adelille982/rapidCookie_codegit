<?php

class Database {
    private PDO $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=rapidcookie";
        $username = "root";
        $password = "";
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }

    public function executeQuery($query, $params = []) {
        // Préparation et exécution de la requête
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
?> 