<?php

class DatabaseConnection
{
    private static $conn;

    /**
     * @throws Exception
     */
    public static function init() {
        self::$conn = new mysqli(getenv("DB_HOST"), getenv("DB_USERNAME"), getenv("DB_PASSWORD"));
        if (self::$conn->connect_error) {
            throw new Exception("Connection failed: " . self::$conn->connect_error);
        }
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