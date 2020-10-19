<?php

class DatabaseConnection
{
    private static $conn;
    
    /**
     * @throws Exception
     */
    public static function init() {
        global $envs;
        self::$conn = new mysqli($envs["DB_HOST"], $envs["DB_USERNAME"], $envs["DB_PASSWORD"]);
        if (self::$conn->connect_error) {
            throw new Exception("Connection failed: " . self::$conn->connect_error);
        }
        self::$conn->query("CREATE DATABASE ".$envs["DB_DATABASE"]);
        self::$conn->begin_transaction();
        self::$conn->select_db($envs["DB_DATABASE"]);
        self::$conn->query("
        CREATE TABLE IF NOT EXISTS user (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100),
            email varchar(100),
            password varchar(100),
            is_superuser bit
        );");
        self::$conn->query("
        CREATE TABLE IF NOT EXISTS chocolate (
            id int PRIMARY KEY AUTO_INCREMENT,
            name varchar(100),
            price int,
            description varchar(500),
            image BLOB,
            stock int,
            sold int
        );");
        self::$conn->query("
        CREATE TABLE IF NOT EXISTS transaction (
            id int PRIMARY KEY AUTO_INCREMENT,
            chocolate int,
            amount int,
            total_price bigint,
            address varchar(20),
            transaction_date date,
            transaction_time time,
            FOREIGN KEY (chocolate) REFERENCES chocolate(id)
        );");
        self::$conn->commit();
    }

    /**
     * @param string $query
     * @return array $data
     * @throws Exception
     */
    public static function prepare_query($query) {
        $res = self::$conn->prepare($query);
        if (!$res) {
            return false;
        }
        return $res;
    }

    /**
     * @param string $query
     * @return array $data
     * @throws Exception
     */
    public static function execute_query($query) {
        $res = self::$conn->query($query);
        if (!$res) {
            return false;
        }
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();
        return $data;
    }
}