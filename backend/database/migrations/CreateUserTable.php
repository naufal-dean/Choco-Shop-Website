<?php


class CreateUserTable
{
    public static function up($conn) {
        echo '[+] Migrating user table...'.PHP_EOL;
        $conn->query("
        CREATE TABLE IF NOT EXISTS user (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(100),
            email varchar(100),
            password varchar(100),
            is_superuser bit
        );");
        $conn->commit();
        echo '[+] Done...'.PHP_EOL;
    }
}