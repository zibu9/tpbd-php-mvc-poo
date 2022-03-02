<?php

namespace Database;

use PDO;

class DBConnexion{
    private $db,
            $host,
            $user,
            $password,
            $pdo;
    public function __construct(string $db, string $host, string $user, string $password)
    {
        $this->db = $db;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->host}", $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
        ]);
    }
}