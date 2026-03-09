<?php
// app/core/Db.php

class Db {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $configFile = __DIR__ . '/../config/config.php';
        
        if (!file_exists($configFile)) {
            die('Configuration file not found: ' . $configFile);
        }
        
        $cfg = require $configFile;
        
        if (!isset($cfg['database'])) {
            die('Database configuration not found in config.php');
        }
        
        $dbCfg = $cfg['database'];
        
        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
            $dbCfg['host'] ?? 'localhost',
            $dbCfg['port'] ?? 3306,
            $dbCfg['database'] ?? ''
        );
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => true,
        ];
        
        try {
            $this->pdo = new PDO(
                $dsn, 
                $dbCfg['username'] ?? 'root', 
                $dbCfg['password'] ?? '', 
                $options
            );
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage() . '<br>DSN: ' . $dsn);
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance; // Trả về instance của Db, không phải $pdo
    }
    
    // Thêm method pdo() để lấy PDO object
    public function pdo() {
        return $this->pdo;
    }
    
    private function __clone() {}
    
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}