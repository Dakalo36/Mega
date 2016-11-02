<?php

/**
 * 
 */
class Connect
{
    private static $database_instance = FALSE;

    private function __construct() {}
    private function __clone() {}

    public function createDb() {
        $root_password = "";
        $db = "matcha";
        if (!self::$database_instance) {
            try {
        $dbh = new PDO("mysql:host=127.0.0.1;", "root", $root_password);

        $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`;");
        self::$database_instance = TRUE;

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
        }
        return self::$database_instance;
    }

}


?>