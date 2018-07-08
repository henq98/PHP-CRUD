<?php

// Conexão ao MySQL Database seguindo Singleton Pattern

class Database {

    private static $connection;

    public static function connectDB() {

        if (!isset(self::$connection)) {

            try {

                self::$connection = new PDO("mysql:host=localhost;dbname=contatos; charset=UTF8", "root", "");

                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$connection;
    }
    public static function prepare($sql) {
        return self::connectDB()->prepare($sql);
    }
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Content-Type: application/json');