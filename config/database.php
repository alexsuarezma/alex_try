<?php

class Database {
    public static function connect(){
        // $db = new mysqli('localhost', 'root', '', 'prueba');
        // $db->query('SET NAMES "utf8"');
        try {
            
            $db = new PDO('mysql:host=localhost;port=3306;dbname=prueba', 'root', '', array( 
                                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_general_ci", 
                                    PDO::ATTR_PERSISTENT => true,
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $db;
          } catch (Exception $e) {
            die("No se pudo conectar con la base: " . $e->getMessage());
          }
    }
}