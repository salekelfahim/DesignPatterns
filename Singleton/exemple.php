<?php

class Database
{
    private $host = "";
    private $user = "";
    private $password = "";
    private $db = "";

    private  $pdo;
    private static $instance;

    private function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e;
            exit();
        }
    }

    public static function connexion()
    {
        if (!isset($instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }


}

