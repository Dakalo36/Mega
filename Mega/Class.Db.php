<?php
require_once("Class.Connection.php");
/**
 * 
 */
class Db extends Connect
{
    private static $Instance = NULL;
    private static $Ins_cre_tblUser = FALSE;

    function __construct() {}
    private function __clone() {}

    private function _creatTblUser($db) {
    if (!self::$Ins_cre_tblUser) {
        // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users_tbl 
        (   
            id int NOT NULL AUTO_INCREMENT, 
            firstname varchar(128) NOT NULL, 
            lastname varchar(512) NOT NULL, 
            email varchar(128) NOT NULL,
            password varchar(128) NOT NULL, 
            PRIMARY KEY (id));";
    try{
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec($sql);
    } catch(PDOException $e) {
     echo $sql . "<br>" . $e->getMessage();   
        }
    $Ins_cre_tblUser = TRUE;
    } else {
        return;
    }
}

    public function getInstance() {
        Connect::createDb();
        session_start();
        if (!isset(self::$Instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$Instance = new PDO('mysql:host=127.0.0.1;dbname=matcha', 'root', '', $pdo_options);
        self::_creatTblUser(self::$Instance);
      }
      return self::$Instance;
    }
}


?>
